// Copyright (C) 2011 DotNetInvoice. International copyright. All Rights Reserved.
// This software is protected by United States and International copyright law and
// international treaty provisions.

function hide(o)
{
    document.getElementById(o).style.display='none';
}
function applicationLoad()
{
    Sys.WebForms.PageRequestManager.propertyChanged.add(
        function(obj, e)
        {
            if (e.get_propertyName() == "inPostBack")
            {
                if(obj.get_inPostBack()) 
                {
                    disableAll();
                }
            }
        }
    );
 }
function disableAll()
{
    var dml=document.forms[0];
    var len = dml.elements.length;
    var i=0;
    for( i=0 ; i<len ; i++) 
    {
        dml.elements[i].disabled=true;
        
    }
    //    dml=document.anchors;
    //    len = dml.length;
    //    i=0;
    //    for( i=0 ; i<len ; i++) 
    //    {
    //        dml[i].disabled=true;
    //        
    //    }
}
function lineItem(vals,d,a,t)
{
    //alert(vals);
    var ar = vals.split("||");
    var c = document.getElementById(t).checked;
    
    document.getElementById(d).value = ar[0];
    document.getElementById(d).focus();
    for(w=0;w<10000;w++)
    {
        void(0);
    }
    document.getElementById(a).value = ar[1];
    document.getElementById(a).focus();
    for(w=0;w<10000;w++)
    {
        void(0);
    }
    if(document.getElementById(t).checked == ar[2])
    {
        for(w=0;w<10000;w++)
        {
            void(0);
        }
        document.getElementById(t).click();
    }
    else
    {
        document.getElementById(t).click();
        for(w=0;w<10000;w++)
        {
            void(0);
        }
        document.getElementById(t).click();
    }
}

function textboxMultilineMaxNumber(txtId,maxLen)
{
    txt = document.getElementById(txtId);
    if(txt.value.length > maxLen)
        txt.value = txt.value.substring(0,maxLen);
}
