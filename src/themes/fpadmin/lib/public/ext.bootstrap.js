/**
* jquery.bootstrap.js
Copyright (c) Kris Zhang <kris.newghost@gmail.com>
License: MIT (https://github.com/newghost/bootstrap-jquery-plugin/blob/master/LICENSE)
*/
String.prototype.format||(String.prototype.format=function(){var e=arguments;return this.replace(/{(\d+)}/g,function(t,n){return typeof e[n]!="undefined"?e[n]:t})}),function(e){e.fn.dialog=function(t){var n=this,r=e(n),i=e(document.body),s=r.closest(".dialog"),o="dialog-parent",u=arguments[1],a=arguments[2],f=function(){var t='<div class="dialog modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close">&times;</button><h4 class="modal-title"></h4></div><div class="modal-body"></div><div class="modal-footer"></div></div></div></div>';s=e(t),e(document.body).append(s),s.find(".modal-body").append(r)},l=function(r){var i=(r||t||{}).buttons||{},o=s.find(".modal-footer");o.empty();var u=i.constructor==Array;for(var a in i){var f=i[a],l="",c="",h="btn-default",p="";if(f.constructor==Object)l=f.id,c=f.text,h=f["class"]||f.classed||h,p=f.click;else{if(!!u||f.constructor!=Function)continue;c=a,p=f}$button=e('<button type="button" class="btn">').addClass(h).html(c),l&&$button.attr("id",l),p&&function(e){$button.click(function(){e.call(n)})}(p),o.append($button)}o.data("buttons",i)},c=function(){s.modal("show")},h=function(e){s.modal("hide").one("hidden.bs.modal",function(){e&&(r.data(o).append(r),s.remove())})};if(t.constructor==Object){!r.data(o)&&r.data(o,r.parent()),s.size()<1&&f(),l(),e(".modal-title",s).html(t.title||"");var p=e(".modal-dialog",s).addClass(t.dialogClass||"");e(".modal-header .close",s).click(function(){var e=t.onClose||h;e.call(n)}),(t["class"]||t.classed)&&s.addClass(t["class"]||t.classed),t.autoOpen===!1&&(t.show=!1),t.width&&p.width(t.width),t.height&&p.height(t.height),s.modal(t)}t=="destroy"&&h(!0),t=="close"&&h(),t=="open"&&c();if(t=="option"&&u=="buttons"){if(!a)return s.find(".modal-footer").data("buttons");l({buttons:a}),c()}return n}}(jQuery),$.messager=function(){var e=function(e,t){var n=$.messager.model;arguments.length<2&&(t=e||"",e="&nbsp;"),$("<div>"+t+"</div>").dialog({title:e,onClose:function(){$(this).dialog("destroy")},buttons:[{text:n.ok.text,classed:n.ok.classed||"btn-success",click:function(){$(this).dialog("destroy")}}]})},t=function(e,t,n){var r=$.messager.model;$("<div>"+t+"</div>").dialog({title:e,onClose:function(){$(this).dialog("destroy")},buttons:[{text:r.ok.text,classed:r.ok.classed||"btn-success",click:function(){$(this).dialog("destroy"),n&&n()}},{text:r.cancel.text,classed:r.cancel.classed||"btn-danger",click:function(){$(this).dialog("destroy")}}]})},n='<div class="dialog modal fade msg-popup"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-body text-center"></div></div></div></div>',r,i=function(e){r||(r=$(n),$("body").append(r)),r.find(".modal-body").html(e),r.modal({show:!0,backdrop:!1}),setTimeout(function(){r.modal("hide")},1500)};return{alert:e,popup:i,confirm:t}}(),$.messager.model={ok:{text:"OK",classed:"btn-success"},cancel:{text:"Cancel",classed:"btn-danger"}},function(e){e.fn.datagrid=function(t,n){var r=this,i=e(r),s=i.data("config")||{},o=i.data("rows")||[],u=s.selectedClass||"success",a=s.singleSelect,f=function(t){var n=s.selectChange,r=s.edit,f=function(t){var r=e(this),s=r.hasClass(u),f=e("tbody tr",i).index(r),l=o[f]||{};a&&e("tbody tr",i).removeClass(u),r.toggleClass(u),n&&n(!s,f,l,r)};(n||typeof a!="undefined")&&t.click(f);var l=function(t){var n=e(this),r=n.closest("tr"),s=e("tbody tr",i).index(r),u=o[s]||{},a=n.attr("name");a&&(u[a]=n.val())};r&&t.find("input").keyup(l)},l=function(e,t){var n="<tr>";for(var r=0,i=e[0].length;r<i;r++){var o=e[0][r],u=o.formatter,a=o.field,f=o.tip,l=t[a],c=o.maxlength,h=o.readonly;typeof l=="undefined"&&(l=""),s.edit&&(c=c?' maxlength="{0}"'.format(o.maxlength):"",h=h?' readonly="readonly"':"",l='<input name="{0}" value="{1}" class="form-control"{2}{3}/>'.format(o.field,l,c,h)),l=u?u(t[a],t):l,n=n+"<td>"+l+"</td>"}return n+="</tr>",n},c=function(t){if(!n)return;var r=s.columns,o=n.rows||n;if(!r)return;var u="<tbody>";if(o)for(var a=0,c=o.length;a<c;a++)u+=l(r,o[a]);u+="</tbody>",e("tbody",i).remove(),i.data("rows",o).append(u),s.edit&&i.addClass("edit"),f(e("tbody tr",i))},h=function(){if(n&&typeof n.index!="undefined")return[n.index];var t=[];return i.find("tbody tr").each(function(n){var r=e(this);r.hasClass(u)&&t.push(n)}),t};if(t&&t.constructor==Object){var p=t.columns;if(p){e("thead",i).size()<1&&i.append("<thead></thead>");var d="<tr>";for(var v=0,m=p[0].length;v<m;v++){var g=p[0][v];d+="<th>"+(g.title||"")+"</th>"}d+="</tr>",i.data("config",t),e("thead",i).html(d)}}t=="loadData"&&c();if(t=="getData")return o;if(t=="getConfig")return s;if(t=="getColumns")return s.columns;if(t=="selectRow"){if(typeof a=="undefined")return;typeof n=="number"?(a&&i.datagrid("unselectRow"),e("tbody tr",i).eq(n).addClass(u)):a||e("tbody tr",i).addClass(u)}t=="unselectRow"&&(typeof n!="undefined"?e("tbody tr",i).eq(n).removeClass(u):e("tbody tr",i).removeClass(u));if(t=="updateRow"){var y=h(),b=n.row,p=s.columns;for(var v=0,m=y.length;v<m;v++){var w=y[v];o&&(b=e.extend(o[w],b));var E=e(l(p,b,s));typeof n.index=="undefined"&&E.addClass(u),e("tbody tr",i).eq(w).after(E).remove(),f(E)}}if(t=="getSelections"){var S=[];return e("tbody tr",i).each(function(t){e(this).hasClass(u)&&S.push(o[t])}),S}if(t=="getSelectedIndex")return h();if(t=="insertRow"){var x=h()[0],b=n.row;if(typeof x=="undefined"||x<0)x=o.length;if(!s||!b)return i;var T=e("tbody tr",i),E=e(l(s.columns,b,s)),N=T.eq(x);f(E),N.size()?N.before(E):e("tbody",i).append(E),o.splice(x,0,b)}if(t=="deleteRow"){var y=typeof n=="number"?[n]:h();for(var v=y.length-1;v>-1;v--){var x=y[v];e("tbody tr",i).eq(x).remove(),o.splice(x,1)}}return r}}(jQuery),function(e){e.fn.tree=function(t,n){var r=this,i=e(r),s=Array.prototype.push,o="glyphicon-file",u="glyphicon-folder-open",a="glyphicon-folder-close",f=function(e,t,n){var r=[];!t&&r.push('<ul style="display:{0}">'.format(n=="close"?"none":"block"));for(var i=0,l=e.length;i<l;i++){var c=e[i],h=c.children,p=c.id,d=c.state,v=c.attributes;r.push("<li>");var m=typeof h=="undefined"?o:d=="close"?a:u;r.push('<span class="glyphicon {0}"></span> '.format(m)),r.push("<a{1}{2}{3}>{0}</a>".format(c.text,h?" class='tree-node'":"",p?" data-id='{0}'".format(p):"",v?" data-attr='{0}'".format(JSON.stringify(v)):"")),h&&s.apply(r,f(h,!1,d)),r.push("</li>")}return!t&&r.push("</ul>"),r},l=function(){e("span.glyphicon-folder-open, span.glyphicon-folder-close",i).click(function(t){var n=e(this),r=n.closest("li").children("ul");n.hasClass(a)?(n.removeClass(a).addClass(u),r.show()):(n.removeClass(u).addClass(a),r.hide())})};if(t&&t.constructor==Object){var c=t.data;if(c&&c.constructor==Array){var h=f(c,!0);i.html(h.join("")),i.data("config",t),l()}var p=t.onClick;p&&e("li>a",i).click(function(){var t=e(this);attrs=t.attr("data-attr"),p.call(r,{id:t.attr("data-id"),attributes:attrs?JSON.parse(attrs):{},text:t.text()},t)})}return r}}(jQuery)


//message
;(function($, undefined) {
	"use strict";

	var pluginName = 'scojs_message';

	$[pluginName] = function(message, type,delaytime) {
		clearTimeout($[pluginName].timeout);
		var $selector = $('#' + $[pluginName].options.id);
		if (!$selector.length) {
			$selector = $('<div/>', {id: $[pluginName].options.id}).appendTo($[pluginName].options.appendTo);
		}
		if ($[pluginName].options.animate) {
			$selector.addClass('page_mess_animate');
		} else {
			$selector.removeClass('page_mess_animate');
		}
		$selector.html(message);
		if (type === undefined || type == $[pluginName].TYPE_ERROR) {
			$selector.removeClass($[pluginName].options.okClass).removeClass($[pluginName].options.infoClass).addClass($[pluginName].options.errClass);
		} else if (type == $[pluginName].TYPE_OK) {
			$selector.removeClass($[pluginName].options.errClass).removeClass($[pluginName].options.infoClass).addClass($[pluginName].options.okClass);
		} else if (type == $[pluginName].TYPE_INFO) {
			$selector.removeClass($[pluginName].options.errClass).removeClass($[pluginName].options.okClass).addClass($[pluginName].options.infoClass);
		}
		$selector.slideDown('fast', function() {
			if (!delaytime) delaytime=$[pluginName].options.delay;
			$[pluginName].timeout = setTimeout(function() { $selector.slideUp('fast'); }, delaytime);
		});
	};


	$.extend($[pluginName], {
		options: {
			 id: 'page_message'
			,okClass: 'page_mess_ok'
			,errClass: 'page_mess_error'
			,infoClass: 'page_mess_info'
			,animate: true
			,delay: 5000
			,appendTo: 'body'	// where should the modal be appended to (default to document.body). Added for unit tests, not really needed in real life.
		},

		TYPE_ERROR: 1,
		TYPE_OK: 2,
		TYPE_INFO: 3
	});
})(jQuery);
//tooltip
;(function($, undefined) {
	"use strict";

	var pluginName = 'scojs_tooltip';

	function Tooltip($trigger, options) {
		this.options = $.extend({}, $.fn[pluginName].defaults, options);
		this.$trigger = this.$target = $trigger;
		this.leaveTimeout = null;

		this.$tooltip = $('<div class="tooltip"><span></span><div class="pointer"></div></div>').appendTo(this.options.appendTo).hide();
		if (this.options.contentElem !== undefined && this.options.contentElem !== null) {
			this.options.content = $(this.options.contentElem).html();
		} else if (this.options.contentAttr !== undefined && this.options.contentAttr !== null) {
			this.options.content = this.$trigger.attr(this.options.contentAttr);
		}
		if (this.$trigger && this.$trigger.attr('title')) {
			this.$trigger.data('originalTitle', this.$trigger.attr('title'));
		}
		this.$tooltip.find('span').html(this.options.content);
		if (this.options.cssclass != '') {
			this.$tooltip.addClass(this.options.cssclass);
		}
		if (this.options.target !== undefined) {
			this.$target = $(this.options.target);
		}
		if (this.options.hoverable) {
			var self = this;
			this.$tooltip.on('mouseenter.' + pluginName, $.proxy(this.do_mouseenter, self))
						 .on('mouseleave.' + pluginName, $.proxy(this.do_mouseleave, self))
						 .on('close.' + pluginName, $.proxy(this.hide, self));
		}
	}


	$.extend(Tooltip.prototype, {
		show: function(allowMirror) {
			if (allowMirror === undefined) {
				allowMirror = true;
			}
			this.$tooltip.removeClass('pos_w pos_e pos_n pos_s pos_nw pos_ne pos_se pos_sw pos_center').addClass('pos_' + this.options.position);
			var  targetBox = this.$target.offset()
				,tooltipBox = {left: 0, top: 0, width: Math.floor(this.$tooltip.outerWidth()), height: Math.floor(this.$tooltip.outerHeight())}
				,pointerBox = {left: 0, top: 0, width: Math.floor(this.$tooltip.find('.pointer').outerWidth()), height: Math.floor(this.$tooltip.find('.pointer').outerHeight())}
				,docBox = {left: $(document).scrollLeft(), top: $(document).scrollTop(), width: $(window).width(), height: $(window).height()}
				;
			targetBox.left = Math.floor(targetBox.left);
			targetBox.top = Math.floor(targetBox.top);
			targetBox.width = Math.floor(this.$target.outerWidth());
			targetBox.height = Math.floor(this.$target.outerHeight());

			if (this.options.position === 'w') {
				tooltipBox.left = targetBox.left - tooltipBox.width - pointerBox.width;
				tooltipBox.top = targetBox.top + Math.floor((targetBox.height - tooltipBox.height) / 2);
				pointerBox.left = tooltipBox.width;
				pointerBox.top = Math.floor(targetBox.height / 2);
			} else if (this.options.position === 'e') {
				tooltipBox.left = targetBox.left + targetBox.width + pointerBox.width;
				tooltipBox.top = targetBox.top + Math.floor((targetBox.height - tooltipBox.height) / 2);
				pointerBox.left = -pointerBox.width;
				pointerBox.top = Math.floor(tooltipBox.height / 2);
			} else if (this.options.position === 'n') {
				tooltipBox.left = targetBox.left - Math.floor((tooltipBox.width - targetBox.width) / 2);
				tooltipBox.top = targetBox.top - tooltipBox.height - pointerBox.height;
				pointerBox.left = Math.floor(tooltipBox.width / 2);
				pointerBox.top = tooltipBox.height;
			} else if (this.options.position === 's') {
				tooltipBox.left = targetBox.left - Math.floor((tooltipBox.width - targetBox.width) / 2);
				tooltipBox.top = targetBox.top + targetBox.height + pointerBox.height;
				pointerBox.left = Math.floor(tooltipBox.width / 2);
				pointerBox.top = -pointerBox.height;
			} else if (this.options.position === 'nw') {
				tooltipBox.left = targetBox.left - tooltipBox.width + pointerBox.width;	// +pointerBox.width because pointer is under
				tooltipBox.top = targetBox.top - tooltipBox.height - pointerBox.height;
				pointerBox.left = tooltipBox.width - pointerBox.width;
				pointerBox.top = tooltipBox.height;
			} else if (this.options.position === 'ne') {
				tooltipBox.left = targetBox.left + targetBox.width - pointerBox.width;
				tooltipBox.top = targetBox.top - tooltipBox.height - pointerBox.height;
				pointerBox.left = 1;
				pointerBox.top = tooltipBox.height;
			} else if (this.options.position === 'se') {
				tooltipBox.left = targetBox.left + targetBox.width - pointerBox.width;
				tooltipBox.top = targetBox.top + targetBox.height + pointerBox.height;
				pointerBox.left = 1;
				pointerBox.top = -pointerBox.height;
			} else if (this.options.position === 'sw') {
				tooltipBox.left = targetBox.left - tooltipBox.width + pointerBox.width;
				tooltipBox.top = targetBox.top + targetBox.height + pointerBox.height;
				pointerBox.left = tooltipBox.width - pointerBox.width;
				pointerBox.top = -pointerBox.height;
			} else if (this.options.position === 'center') {
				tooltipBox.left = targetBox.left + Math.floor((targetBox.width - tooltipBox.width) / 2);
				tooltipBox.top = targetBox.top + Math.floor((targetBox.height - tooltipBox.height) / 2);
				allowMirror = false;
				this.$tooltip.find('.pointer').hide();
			}

			// if the tooltip is out of bounds we first mirror its position
			if (allowMirror) {
				var  newpos = this.options.position
					,do_mirror = false;
				if (tooltipBox.left < docBox.left) {
					newpos = newpos.replace('w', 'e');
					do_mirror = true;
				} else if (tooltipBox.left + tooltipBox.width > docBox.left + docBox.width) {
					newpos = newpos.replace('e', 'w');
					do_mirror = true;
				}
				if (tooltipBox.top < docBox.top) {
					newpos = newpos.replace('n', 's');
					do_mirror = true;
				} else if (tooltipBox.top + tooltipBox.height > docBox.top + docBox.height) {
					newpos = newpos.replace('s', 'n');
					do_mirror = true;
				}
				if (do_mirror) {
					this.options.position = newpos;
					this.show(false);
					return this;
				}
			}

			// if we're here, it's definitely after the mirroring or the position is center
			// this part is for slightly moving the tooltip if it's still out of bounds
			var pointer_left = null,
				pointer_top = null;
			if (tooltipBox.left < docBox.left) {
				pointer_left = tooltipBox.left - docBox.left - pointerBox.width / 2;
				tooltipBox.left = docBox.left;
			} else if (tooltipBox.left + tooltipBox.width > docBox.left + docBox.width) {
				pointer_left = tooltipBox.left - docBox.left - docBox.width + tooltipBox.width - pointerBox.width / 2;
				tooltipBox.left = docBox.left + docBox.width - tooltipBox.width;
			}
			if (tooltipBox.top < docBox.top) {
				pointer_top = tooltipBox.top - docBox.top - pointerBox.height / 2;
				tooltipBox.top = docBox.top;
			} else if (tooltipBox.top + tooltipBox.height > docBox.top + docBox.height) {
				pointer_top = tooltipBox.top - docBox.top - docBox.height + tooltipBox.height - pointerBox.height / 2;
				tooltipBox.top = docBox.top + docBox.height - tooltipBox.height;
			}

			this.$tooltip.css({left: tooltipBox.left, top: tooltipBox.top});
			if (pointer_left !== null) {
				this.$tooltip.find('.pointer').css('margin-left', pointer_left);
			}
			if (pointer_top !== null) {
				this.$tooltip.find('.pointer').css('margin-top', '+=' + pointer_top);
			}

			this.$trigger.removeAttr('title');
			this.$tooltip.show();
			return this;
		}

		,hide: function() {
			if (this.$trigger.data('originalTitle')) {
				this.$trigger.attr('title', this.$trigger.data('originalTitle'));
			}
			if (typeof this.options.on_close == 'function') {
				this.options.on_close.call(this);
			}
			this.$tooltip.hide();
		}

		,do_mouseenter: function() {
			if (this.leaveTimeout !== null) {
				clearTimeout(this.leaveTimeout);
				this.leaveTimeout = null;
			}
			this.show();
		}

		,do_mouseleave: function() {
			var self = this;
			if (this.leaveTimeout !== null) {
				clearTimeout(this.leaveTimeout);
				this.leaveTimeout = null;
			}
			if (this.options.autoclose) {
				this.leaveTimeout = setTimeout(function() {
					clearTimeout(self.leaveTimeout);
					self.leaveTimeout = null;
					self.hide();
				}, this.options.delay);
			}
		}
	});

	$.fn[pluginName] = function(options) {
		var  method = null
			,first_run = false
			;
		if (typeof options == 'string') {
			method = options;
		}
		return this.each(function() {
			var obj;
			if (!(obj = $.data(this, pluginName))) {
				var  $this = $(this)
					,data = $this.data()
					,opts
					;
				first_run = true;
				if (typeof options === 'object') {
					opts = $.extend({}, options, data);
				} else {
					opts = data;
				}
				obj = new Tooltip($this, opts);
				$.data(this, pluginName, obj);
			}
			if (method) {
				obj[method]();
			} else if (first_run) {
				$(this).on('mouseenter.' + pluginName, function() {
					obj.do_mouseenter();
				}).on('mouseleave.' + pluginName, function() {
					obj.do_mouseleave();
				});
			} else {
				obj.show();
			}
		});
	};


	$[pluginName] = function(elem, options) {
		if (typeof elem === 'string') {
			elem = $(elem);
		}
		return new Tooltip(elem, options);
	};


	$.fn[pluginName].defaults = {
		 contentElem: null
		,contentAttr: null
		,content: ''
		,hoverable: true		// should mouse over tooltip hold the tooltip or not?
		,delay: 200
		,cssclass: ''
		,position: 'n'			// n,s,e,w,ne,nw,se,sw,center
		,autoclose: true
		,appendTo: 'body'	// where should the tooltips be appended to (default to document.body). Added for unit tests, not really needed in real life.
	};

	$(document).on('mouseenter.' + pluginName, '[data-trigger="tooltip"]', function() {
		$(this)[pluginName]('do_mouseenter');
	}).on('mouseleave.' + pluginName, '[data-trigger="tooltip"]', function() {
		$(this)[pluginName]('do_mouseleave');
	});
	$(document).off('click.' + pluginName, '[data-dismiss="tooltip"]').on('click.' + pluginName, '[data-dismiss="tooltip"]', function(e) {
		$(this).closest('.tooltip').trigger('close');
	});
})(jQuery);
