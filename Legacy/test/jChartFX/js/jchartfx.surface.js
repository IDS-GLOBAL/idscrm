(function(){var e=window.cfx;e.surfaceVersion="7.1.5044.21402";var g=window.sfx,l=function b(){b._ic();this.a=this.f=this.l=this.b=this.d=null;this.e=this.g=!1;this.p=this.k=this.c=0};e.by=l;l.prototype={_0by:function(){return this},getColors:function(){return this.b},setColors:function(b){null==b?this.b=null:(this.b=g.m._ca(b.length),b.Sd(this.b,0));this.j(560)},iee:function(){return null},ief:function(){return null!=this.d?this.d.iT().j==this:!1},ied:function(){return!1},getShowContourLines:function(){return this.g},
setShowContourLines:function(b){this.g=b;this.o()},getShowGridLines:function(){return this.e},setShowGridLines:function(b){this.e=b;this.o()},getStep:function(){return 0>this.c?0:this.c},setStep:function(b){this.c=b;this.j(560)},i:function(){return null==this.b||0==this.b.length},h:function(b,c,a){0>=this.c&&(this.c=-b.aS(),0<=this.c&&(this.c=-g.a.d((a-c)/10)));return g.a.d(this.c)},n:function(b,c,a,f,g,e){if(this.g&&!this.e)for(var i=0;i<f;i++){var h=(i+1)%f;a[h].a==a[i].a&&a[i].a==g&&c.ib_(b,e,
a[h].b,a[h].a,a[h].c,a[i].b,a[i].a,a[i].c)}},v:function(b,c,a,f,s,j,i){if(!(-1==f||-1==s||-1==j||-1==i)){var h=b.f,d=e.ba._ca(4),m=e.ba._ca(8),q=b.q<b.p?-1:1,t=b.k.c+e.bR.a(b.ac,b.d,b.a.g),q=t-q*(b.ac+g.u.z(b.ac,b.a.g)+1);d[0].b=a;d[0].a=s;d[0].c=t;d[1].b=a;d[1].a=j;d[1].c=q;d[2].b=c;d[2].a=i;d[2].c=q;d[3].b=c;d[3].a=f;d[3].c=t;var s=d[0].a>d[1].a&&d[0].a>d[3].a&&d[2].a>d[1].a&&d[2].a>d[3].a||d[0].a<d[1].a&&d[0].a<d[3].a&&d[2].a<d[1].a&&d[2].a<d[3].a,i=b.h,n=b.I,l=b.F,x=this.h(i,n,l),r=b.z;this.t();
for(var u=0;u<this.k;u++){var o=this.q(u),o=(new g.ar)._0ar(o),v=this.e?this.f:(new g.ao)._0ao(o),w=this.g&&!this.e?this.f:null,n=n+x;n>l&&(n=l);var p=r,r=i.aa(b.a,n);p++;if(s){d[1].b=a;d[1].a=j;d[1].c=q;var k=e.bW.Q(d,m,r,p,3);0!=k&&(h.ich(b.c,m,k,o,v),this.n(b.c,h,m,k,p,w));d[1].b=c;d[1].a=f;d[1].c=t;k=e.bW.Q(d,m,r,p,3)}else k=e.bW.Q(d,m,r,p,4);0!=k&&(h.ich(b.c,m,k,o,v),this.n(b.c,h,m,k,p,w));o._d();this.e||v._d()}}},q:function(b){if(this.i())return this.l.e();var c=this.b[b%this.b.length]._nc();
c.e()&&c._cf(this.d.iW(b%this.b.length));return c},iei:function(){var b=this.d.iT().o,c,a;a=new g._p2(0,0);b.U(a,!0);c=a.a;a=a.b;c=this.h(b,c,a);return g.a.g((b.o-b.l)/c)},icV:function(){return 1},icW:function(b){return 10==b?1079056136:1079064328},ieG:function(b){this.d=b},iej:function(){return!1},ieg:function(){},icU:function(b,c,a){switch(c){case 11:return this.r(a)}return null},icX:function(b,c,a){var f=c=0;if(a.aO){if(null==this.a||this.a.length!=a.a.g+1)this.a=g.e._ca(a.a.g+1);c=this.h(a.h,
a.I,a.F);this.k=g.a.d(g.a.g((a.F-a.I)/c));0!=(a.r&8)&&(a.a$=!0)}0==a.d&&a.e==a.m&&(this.m(a.b.e,a.b.k._nc(),this.k),this.f=this.e||this.g?a.n.m():null);c=a.k.b;f=a.B?a.K:-1;if(a.B&&a.d!=a.p&&a.e!=a.m){var e=0,e=a.q<a.p?-1:1;this.v(a,c,this.a[a.d].x,f,this.a[a.d].y,this.p,this.a[a.d-e].y)}this.p=this.a[a.d].y;this.a[a.d].x=c;this.a[a.d].y=f;b.a=1;b.b=0;a.d==a.q&&a.e==a.o&&this.u()},ieh:function(b,c,a){var f=this.iei();b.a=!0;c.p=f-1;c.q=0;a&&(b=new g._p2(c.p,c.q),e.bR.b(b),c.p=b.a,c.q=b.b);c.l=a?1:
-1;c.d=c.p-c.l;c.aI(0);a?this.m(c.b.e,c.b.k._nc(),f):this.m(c.b.k,c.b.e._nc(),f)},iek:function(b,c,a,f,e){e._cf(g.g.b);f=this.d.iT().o;e=f.N();f=g.a.n(e.a(f.o).length,e.a(f.l).length);f=g.b.t(g.b.b,2*f,57);b.a=!0;return c.idV(f+" - ",a).c()},iel:function(b,c){b.b=null;b.a=b.b;b.c=null;b.d=-1;if(c.d==c.q)return!1;c.d+=c.l;b.d=c.d;var a=c.h,f=this.h(a,c.I,c.F),e=a.N(),j=(new g.aQ)._0aQ(),i=g.a.n(e.a(a.o).length,e.a(a.l).length),h=a.l+f*c.d,h=e.a(h),h=g.b.t(h,i,32);j.e(h);j.e(" - ");h=a.l+f*(c.d+1);
h=e.a(h);h=g.b.t(h,i,32);j.e(h);b.b=j.toString();c.b.d=0;c.b.e._cf(this.q(c.d));c.N(!0);return!0},m:function(b,c,a){this.i()&&(c.e()&&c._cf(e.bR.ae(b._nc(),0)),this.l=new e.b5(b,c,a))},o:function(){this.j(32)},j:function(b){null!=this.d&&this.d.iaf(b|16777216)},u:function(){null!=this.f&&(this.f._d(),this.f=null)},t:function(){this.i()&&this.l.a()},r:function(b){b.a.e=64;return null}};l._dt("CWGS",g.Sy,0,e.icT,e.iec,e.i_n,e.ieF)})();