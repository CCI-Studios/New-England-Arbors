window.addEvent("domready",function(){var a=$$(".show-menu");menu=$$(".moduletable_hmenu.primary")[0],wrapper=$("wrapper"),body=$$("body")[0],visible=!1;a.addEvent("click",function(a){a=new Event(a);a.stop();body.toggleClass("menu-open");visible=!visible});wrapper.addEvent("click",function(a){if(visible){a=new Event(a);a.preventDefault();visible=!1;body.removeClass("menu-open")}})});