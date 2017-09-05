var getID = function(id){
	return document.getElementById(id);
}

var eventUtil = {
	addHandler:function(element,eventType,handler){
		if(element.addEventListener){
			element.addEventListener(eventType,handler,false);
		}else if(element.attachEvent){
			element.attachEvent("on"+eventType,handler);
		}else{
			element["on"+eventType] = handler;
		}
	},

	removeHandler:function(element,eventType,handler){
		if(element.removeEventListener){
			element.removeEventListener(eventType,handler,false);
		}else if(element.detachEvent){
			element.detachEvent("on"+eventType,handler);
		}else{
			element["on"+eventType] = null;
		}
	},

	getEvent:function(event){
		return event?event:window.event;
	},

	getTarget:function(event){
		if(event.target){
			return event.target;
		}else if(event.srcElement){
			return event.srcElement;
		}
	}
};

var module = (function(){
	var alpha = 0,speed = 0,timer;
	var animate = function(obj,attr,target,time){
		clearInterval(timer);
		timer = setInterval(function(){
			if(attr == "opacity"){
				if(alpha == target){
					clearInterval(timer);
					if(alpha == 0){
						hidden(obj);
					}
				}else{
					speed = speed>0 ? Math.ceil((target-alpha)/10) : Math.floor((target-alpha)/10);
					alpha += speed;
					obj.style.opacity = alpha/100;
					obj.style.filter = "alpha(opacity:"+alpha+")";
				}
			}
		},time);
	}
	return {
		animate:animate,
	};
})();

function hidden(obj){
	obj.style.display = "none";
}

function visibility(obj){
	obj.style.display = "block";
}

function showMessage(){
	var contact_item = getID("contact_icon").children;
	var caret = getID("caret");
	var contact_wrap = getID("contact_wrap");
	var contact_msg = getID("contact_msg");
	var last_li = null,target = null;
	for(var i=0;i<contact_item.length;i++){
		contact_item[i].onclick = (function(i){
			return function(event){
				event = eventUtil.getEvent(event);
				target = eventUtil.getTarget(event);
				if(contact_msg.style.display == "none"){
					visibility(contact_msg);
					module.animate(contact_msg,"opacity",100,50);
					last_li = target;
				}else if(contact_msg.style.display == "block"){
					if(target == last_li){
						module.animate(contact_msg,"opacity",0,50);
					}
				}
				last_li = target;
				var left = this.offsetLeft+this.offsetWidth/2-13;
				caret.style.left = left+"px";
				contact_wrap.style.top = -i*25+"px";
			}
		})(i);
	}
}

function scrolltop(){
	if(document.body.scrollTop){
		return document.body.scrollTop;
	}else if(document.documentElement.scrollTop){
		return document.documentElement.scrollTop;
	}
}

function clientheight(){
	if(document.compatMode == "CSS1Compat"){
		return document.documentElement.clientHeight;
	}else{
		return document.body.clientHeight;
	}
}

function addSelectPage(){
	if(getID("page")){
		var page = getID("page");
		var fragment = document.createDocumentFragment();
		var count = page.getAttribute('count');
		for(var i=0;i<count;i++){
			var option = document.createElement('option');
			option.value = i+1;
			option.appendChild(document.createTextNode('第'+(i+1)+'页'));
			fragment.appendChild(option);
		}
		page.appendChild(fragment);
	}
	return;
}

function reqAjax(url,method,data,func){
	$.ajax({
		url:url,
		method:method,
		dataType:'json',
		data:data,
		success:func
	});
}

function selectMon(url){
	$('#select_date').change(function(){
		var dateMon = $(this).val();
		var data = {'dateMon':dateMon};
		var method = 'post';
		reqAjax(url,method,data,function(result){
			window.location.href = result.url;
		});
	});
}

function returnTop(){
	var clientHeight = clientheight();
	var gotop = getID("gotop");
	var timer = null;
	function toggleGoTop(){
		var scrollTop = scrolltop();
		if(scrollTop > clientHeight){
			gotop.style.display = "block";
		}else{
			gotop.style.display = "none";
		}
	}

	function goToTop(){
		clearInterval(timer);
		var target = 0,speed=0,nowTop;
		timer = setInterval(function(){
			var scrollTop = scrolltop();
			if(scrollTop == undefined){
				clearInterval(timer);
			}else{
				speed = speed > 0 ? Math.ceil((target-scrollTop)/10) : Math.floor((target-scrollTop)/10);
				nowTop = scrollTop+speed;
				window.scrollTo(0,nowTop);
			}
		},10)
	}

	eventUtil.addHandler(window,"scroll",toggleGoTop);
	eventUtil.addHandler(gotop,"click",goToTop);
	
	window.unload = function(){
		eventUtil.removeHandler(window,"scroll",toggleGoTop);
		eventUtil.removeHandler(gotop,"click",goToTop);
	}
}