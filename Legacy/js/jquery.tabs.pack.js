(function ($) {
    $.extend({
        tabs: {
            remoteCount: 0
        }
    });
    $.fn.tabs = function (initial, settings) {
        if (typeof initial == 'object') settings = initial;
        settings = $.extend({
            initial: (initial && typeof initial == 'number' && initial > 0) ? --initial : 0,
            disabled: null,
            bookmarkable: $.ajaxHistory ? true : false,
            remote: false,
            hashPrefix: 'remote-tab-',
            fxFade: null,
            fxSlide: null,
            fxShow: null,
            fxHide: null,
            fxSpeed: 'normal',
            fxShowSpeed: null,
            fxHideSpeed: null,
            fxAutoHeight: false,
            onClick: null,
            onHide: null,
            onShow: null,
            navClass: 'tabs-nav',
            selectedClass: 'tabs-selected',
            disabledClass: 'tabs-disabled',
            containerClass: 'tabs-container',
            hideClass: 'tabs-hide',
            loadingClass: 'tabs-loading',
            tabStruct: 'div'
        }, settings || {});
        $.browser.msie6 = $.browser.msie6 || $.browser.msie && typeof XMLHttpRequest == 'function';

        function unFocus() {
            scrollTo(0, 0)
        }
        return this.each(function () {
            var container = this;
            var nav = $('ul.' + settings.navClass, container);
            nav = nav.size() && nav || $('>ul:eq(0)', container);
            var tabs = $('a', nav);
            if (settings.remote) {
                var remoteUrls = {};
                tabs.each(function () {
                    $(this).html('<span>' + $(this).html() + '</span>');
                    var id = settings.hashPrefix + (++$.tabs.remoteCount);
                    var hash = '#' + id;
                    remoteUrls[hash] = this.href;
                    this.href = hash;
                    $('<div id="' + id + '" class="' + settings.containerClass + '"></div>').appendTo(container)
                })
            }
            var containers = $('div.' + settings.containerClass, container);
            containers = containers.size() && containers || $('>' + settings.tabStruct, container);
            nav.is('.' + settings.navClass) || nav.addClass(settings.navClass);
            containers.each(function () {
                var $$ = $(this);
                $$.is('.' + settings.containerClass) || $$.addClass(settings.containerClass)
            });
            var hasSelectedClass = $('li', nav).index($('li.' + settings.selectedClass, nav)[0]);
            if (hasSelectedClass >= 0) {
                settings.initial = hasSelectedClass
            }
            if (location.hash) {
                tabs.each(function (i) {
                    if (this.hash == location.hash) {
                        settings.initial = i;
                        if (($.browser.msie || $.browser.opera) && !settings.remote) {
                            var toShow = $(location.hash);
                            var toShowId = toShow.attr('id');
                            toShow.attr('id', '');
                            setTimeout(function () {
                                toShow.attr('id', toShowId)
                            }, 500)
                        }
                        unFocus();
                        return false
                    }
                })
            }
            if ($.browser.msie) {
                unFocus()
            }
            containers.filter(':eq(' + settings.initial + ')').show().end().not(':eq(' + settings.initial + ')').addClass(settings.hideClass);
            if (!settings.remote) {
                $('li', nav).removeClass(settings.selectedClass).eq(settings.initial).addClass(settings.selectedClass)
            }
            if (settings.fxAutoHeight) {
                var _setAutoHeight = function (reset) {
                        var heights = $.map(containers.get(), function (el) {
                            var h, jq = $(el);
                            if (reset) {
                                if ($.browser.msie6) {
                                    el.style.removeExpression('behaviour');
                                    el.style.height = '';
                                    el.minHeight = null
                                }
                                h = jq.css({
                                    'min-height': ''
                                }).height()
                            } else {
                                h = jq.height()
                            }
                            return h
                        }).sort(function (a, b) {
                            return b - a
                        });
                        if ($.browser.msie6) {
                            containers.each(function () {
                                this.minHeight = heights[0] + 'px';
                                this.style.setExpression('behaviour', 'this.style.height = this.minHeight ? this.minHeight : "1px"')
                            })
                        } else {
                            containers.css({
                                'min-height': heights[0] + 'px'
                            })
                        }
                    };
                _setAutoHeight();
                var cachedWidth = container.offsetWidth;
                var cachedHeight = container.offsetHeight;
                var watchFontSize = $('#tabs-watch-font-size').get(0) || $('<span id="tabs-watch-font-size">M</span>').css({
                    display: 'block',
                    position: 'absolute',
                    visibility: 'hidden'
                }).appendTo(document.body).get(0);
                var cachedFontSize = watchFontSize.offsetHeight;
                setInterval(function () {
                    var currentWidth = container.offsetWidth;
                    var currentHeight = container.offsetHeight;
                    var currentFontSize = watchFontSize.offsetHeight;
                    if (currentHeight > cachedHeight || currentWidth != cachedWidth || currentFontSize != cachedFontSize) {
                        _setAutoHeight((currentWidth > cachedWidth || currentFontSize < cachedFontSize));
                        cachedWidth = currentWidth;
                        cachedHeight = currentHeight;
                        cachedFontSize = currentFontSize
                    }
                }, 50)
            }
            var showAnim = {},
                hideAnim = {},
                showSpeed = settings.fxShowSpeed || settings.fxSpeed,
                hideSpeed = settings.fxHideSpeed || settings.fxSpeed;
            if (settings.fxSlide || settings.fxFade) {
                if (settings.fxSlide) {
                    showAnim['height'] = 'show';
                    hideAnim['height'] = 'hide'
                }
                if (settings.fxFade) {
                    showAnim['opacity'] = 'show';
                    hideAnim['opacity'] = 'hide'
                }
            } else {
                if (settings.fxShow) {
                    showAnim = settings.fxShow
                } else {
                    showAnim['min-width'] = 0;
                    showSpeed = settings.bookmarkable ? 50 : 1
                }
                if (settings.fxHide) {
                    hideAnim = settings.fxHide
                } else {
                    hideAnim['min-width'] = 0;
                    hideSpeed = settings.bookmarkable ? 50 : 1
                }
            }
            var onClick = settings.onClick,
                onHide = settings.onHide,
                onShow = settings.onShow;
            tabs.bind('triggerTab', function () {
                var li = $(this.parentNode);
                if (container.locked || li.is('.' + settings.selectedClass) || li.is('.' + settings.disabledClass)) {
                    return false
                }
                var hash = this.hash;
                if ($.browser.msie) {
                    $(this).trigger('click');
                    if (settings.bookmarkable) {
                        $.ajaxHistory.update(hash);
                        location.hash = hash.replace('#', '')
                    }
                } else if ($.browser.safari) {
                    var tempForm = $('<form action="' + hash + '"><div><input type="submit" value="h" /></div></form>').get(0);
                    tempForm.submit();
                    $(this).trigger('click');
                    if (settings.bookmarkable) {
                        $.ajaxHistory.update(hash)
                    }
                } else {
                    if (settings.bookmarkable) {
                        location.hash = hash.replace('#', '')
                    } else {
                        $(this).trigger('click')
                    }
                }
            });
            tabs.bind('disableTab', function () {
                var li = $(this.parentNode);
                if ($.browser.safari) {
                    li.animate({
                        opacity: 0
                    }, 1, function () {
                        li.css({
                            opacity: ''
                        })
                    })
                }
                li.addClass(settings.disabledClass)
            });
            if (settings.disabled && settings.disabled.length) {
                for (var i = 0, k = settings.disabled.length; i < k; i++) {
                    tabs.eq(--settings.disabled[i]).trigger('disableTab').end()
                }
            };
            tabs.bind('enableTab', function () {
                var li = $(this.parentNode);
                li.removeClass(settings.disabledClass);
                if ($.browser.safari) {
                    li.animate({
                        opacity: 1
                    }, 1, function () {
                        li.css({
                            opacity: ''
                        })
                    })
                }
            });
            tabs.bind('click', function (e) {
                var trueClick = e.clientX;
                var clicked = this,
                    li = $(this.parentNode),
                    toShow = $(this.hash),
                    toHide = containers.filter(':visible');
                if ((typeof onClick == 'function' && onClick(this, toShow[0], toHide[0]) == false && trueClick) || container.locked || li.is('.' + settings.selectedClass) || li.is('.' + settings.disabledClass)) {
                    this.blur();
                    return false
                }
                container['locked'] = true;
                if (toShow.size()) {
                    if ($.browser.msie && settings.bookmarkable) {
                        var toShowId = this.hash.replace('#', '');
                        toShow.attr('id', '');
                        setTimeout(function () {
                            toShow.attr('id', toShowId)
                        }, 0)
                    }
                    function switchTab() {
                        if (settings.bookmarkable && trueClick) {
                            $.ajaxHistory.update(clicked.hash)
                        }
                        toHide.animate(hideAnim, hideSpeed, function () {
                            $(clicked.parentNode).addClass(settings.selectedClass).siblings().removeClass(settings.selectedClass);
                            if (typeof onHide == 'function') {
                                onHide(clicked, toShow[0], toHide[0])
                            }
                            toHide.addClass(settings.hideClass).css({
                                display: '',
                                overflow: '',
                                height: '',
                                opacity: ''
                            });
                            toShow.removeClass(settings.hideClass).animate(showAnim, showSpeed, function () {
                                toShow.css({
                                    overflow: '',
                                    height: '',
                                    opacity: ''
                                });
                                if ($.browser.msie) {
                                    toHide[0].style.filter = '';
                                    toShow[0].style.filter = ''
                                }
                                if (typeof onShow == 'function') {
                                    onShow(clicked, toShow[0], toHide[0])
                                }
                                container.locked = null
                            })
                        })
                    }
                    if (!settings.remote) {
                        switchTab()
                    } else {
                        var $$ = $(this),
                            span = $('span', this)[0],
                            text = span.innerHTML;
                        $$.addClass(settings.loadingClass);
                        span.innerHTML = 'Loading&#8230;';
                        setTimeout(function () {
                            $(clicked.hash).load(remoteUrls[clicked.hash], function () {
                                switchTab();
                                span.innerHTML = text;
                                $$.removeClass(settings.loadingClass)
                            })
                        }, 0)
                    }
                } else {
                    alert('There is no such container.')
                }
                var scrollX = window.pageXOffset || document.documentElement && document.documentElement.scrollLeft || document.body.scrollLeft || 0;
                var scrollY = window.pageYOffset || document.documentElement && document.documentElement.scrollTop || document.body.scrollTop || 0;
                setTimeout(function () {
                    window.scrollTo(scrollX, scrollY)
                }, 0);
                this.blur();
                return settings.bookmarkable && !! trueClick
            });
            if (settings.remote) {
                tabs.eq(settings.initial).trigger('click').end()
            }
            if (settings.bookmarkable) {
                $.ajaxHistory.initialize(function () {
                    tabs.eq(settings.initial).trigger('click').end()
                })
            }
        })
    };
    var tabEvents = ['triggerTab', 'disableTab', 'enableTab'];
    for (var i = 0; i < tabEvents.length; i++) {
        $.fn[tabEvents[i]] = (function (tabEvent) {
            return function (tab) {
                return this.each(function () {
                    var nav = $('ul.tabs-nav', this);
                    nav = nav.size() && nav || $('>ul:eq(0)', this);
                    var a;
                    if (!tab || typeof tab == 'number') {
                        a = $('li>a', nav).eq((tab && tab > 0 && tab - 1 || 0))
                    } else if (typeof tab == 'string') {
                        a = $('li>a[@href$="#' + tab + '"]', nav)
                    }
                    a.trigger(tabEvent)
                })
            }
        })(tabEvents[i])
    }
})(jQuery);