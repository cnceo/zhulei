<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="">
<style>
body {font-family: "微软雅黑";}
.layer {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,.5);
        z-index: 900;
    }

    .layer_content {
         background: #fff;
		position: fixed;
		width: 15rem;
		left: 50%;
		top: 50%;
		text-align: center;
		z-index: 901;
		height: 19rem;
		margin-top: -8.5rem;
		margin-left: -7.5rem;

    }
    .layer_content .layer_title {
        font-size: .55rem;
        color: #fff;
        line-height: .9rem;
        padding: .3rem .5rem;
        background: #45a5cf;
        text-align: left;
        text-indent: 1.2rem;
    }
    .layer_content p {
        font-size: .55rem;
        color: #333333;
        line-height: 1.4rem;
    }
    .layer_content img {
        width: 8rem;
        margin: 1rem 0;
    }
    .layer_content p span {
        font-size: .45rem;
        color: #999;
        line-height: 0.9rem;
    }

    .layer_content button {
        background: #ff9c00;
        width: 5.5rem;
        height: 1.5rem;
        color: #fff;
        line-height: 1.5rem;
        border-radius: 1.5rem;
        margin: .6rem 0;
    }

    .layer_content i {
        background: url(/template/wap/default/ucenter/images/weidian_25.png) no-repeat;
        background-size: 1rem;
        height: 1.2rem;
        width: 1.24rem;
        display: inline-block;
        vertical-align: middle;
        position: absolute;
        right: -.5rem;
        top: -.5rem;
    }
	.profit, .nickname {
		color: #26CB40;
	}
</style>
<title>刮刮卡</title>
<link href="<?php echo TPL_URL;?>/css/guajiang/css/activity-style.css?<?php echo date('Y-m-d',time());?>" rel="stylesheet" type="text/css">

<script>
/* Zepto v1.0-1-ga3cab6c - polyfill zepto detect event ajax form fx - zeptojs.com/license */


; (function (undefined) {
    if (String.prototype.trim === undefined) // fix for iOS 3.2
        String.prototype.trim = function () { return this.replace(/^\s+|\s+$/g, '') }

    // For iOS 3.x
    // from https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Array/reduce
    if (Array.prototype.reduce === undefined)
        Array.prototype.reduce = function (fun) {
            if (this === void 0 || this === null) throw new TypeError()
            var t = Object(this), len = t.length >>> 0, k = 0, accumulator
            if (typeof fun != 'function') throw new TypeError()
            if (len == 0 && arguments.length == 1) throw new TypeError()

            if (arguments.length >= 2)
                accumulator = arguments[1]
            else
                do {
                    if (k in t) {
                        accumulator = t[k++]
                        break
                    }
                    if (++k >= len) throw new TypeError()
                } while (true)

            while (k < len) {
                if (k in t) accumulator = fun.call(undefined, accumulator, t[k], k, t)
                k++
            }
            return accumulator
        }

})()

var Zepto = (function () {
    var undefined, key, $, classList, emptyArray = [], slice = emptyArray.slice, filter = emptyArray.filter,
      document = window.document,
      elementDisplay = {}, classCache = {},
      getComputedStyle = document.defaultView.getComputedStyle,
      cssNumber = { 'column-count': 1, 'columns': 1, 'font-weight': 1, 'line-height': 1, 'opacity': 1, 'z-index': 1, 'zoom': 1 },
      fragmentRE = /^\s*<(\w+|!)[^>]*>/,
      tagExpanderRE = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/ig,
      rootNodeRE = /^(?:body|html)$/i,

      // special attributes that should be get/set via method calls
      methodAttributes = ['val', 'css', 'html', 'text', 'data', 'width', 'height', 'offset'],

      adjacencyOperators = ['after', 'prepend', 'before', 'append'],
      table = document.createElement('table'),
      tableRow = document.createElement('tr'),
      containers = {
          'tr': document.createElement('tbody'),
          'tbody': table, 'thead': table, 'tfoot': table,
          'td': tableRow, 'th': tableRow,
          '*': document.createElement('div')
      },
      readyRE = /complete|loaded|interactive/,
      classSelectorRE = /^\.([\w-]+)$/,
      idSelectorRE = /^#([\w-]*)$/,
      tagSelectorRE = /^[\w-]+$/,
      class2type = {},
      toString = class2type.toString,
      zepto = {},
      camelize, uniq,
      tempParent = document.createElement('div')

    zepto.matches = function (element, selector) {
        if (!element || element.nodeType !== 1) return false
        var matchesSelector = element.webkitMatchesSelector || element.mozMatchesSelector ||
                              element.oMatchesSelector || element.matchesSelector
        if (matchesSelector) return matchesSelector.call(element, selector)
        // fall back to performing a selector:
        var match, parent = element.parentNode, temp = !parent
        if (temp) (parent = tempParent).appendChild(element)
        match = ~zepto.qsa(parent, selector).indexOf(element)
        temp && tempParent.removeChild(element)
        return match
    }

    function type(obj) {
        return obj == null ? String(obj) :
          class2type[toString.call(obj)] || "object"
    }

    function isFunction(value) { return type(value) == "function" }
    function isWindow(obj) { return obj != null && obj == obj.window }
    function isDocument(obj) { return obj != null && obj.nodeType == obj.DOCUMENT_NODE }
    function isObject(obj) { return type(obj) == "object" }
    function isPlainObject(obj) {
        return isObject(obj) && !isWindow(obj) && obj.__proto__ == Object.prototype
    }
    function isArray(value) { return value instanceof Array }
    function likeArray(obj) { return typeof obj.length == 'number' }

    function compact(array) { return filter.call(array, function (item) { return item != null }) }
    function flatten(array) { return array.length > 0 ? $.fn.concat.apply([], array) : array }
    camelize = function (str) { return str.replace(/-+(.)?/g, function (match, chr) { return chr ? chr.toUpperCase() : '' }) }
    function dasherize(str) {
        return str.replace(/::/g, '/')
               .replace(/([A-Z]+)([A-Z][a-z])/g, '$1_$2')
               .replace(/([a-z\d])([A-Z])/g, '$1_$2')
               .replace(/_/g, '-')
               .toLowerCase()
    }
    uniq = function (array) { return filter.call(array, function (item, idx) { return array.indexOf(item) == idx }) }

    function classRE(name) {
        return name in classCache ?
          classCache[name] : (classCache[name] = new RegExp('(^|\\s)' + name + '(\\s|$)'))
    }

    function maybeAddPx(name, value) {
        return (typeof value == "number" && !cssNumber[dasherize(name)]) ? value + "px" : value
    }

    function defaultDisplay(nodeName) {
        var element, display
        if (!elementDisplay[nodeName]) {
            element = document.createElement(nodeName)
            document.body.appendChild(element)
            display = getComputedStyle(element, '').getPropertyValue("display")
            element.parentNode.removeChild(element)
            display == "none" && (display = "block")
            elementDisplay[nodeName] = display
        }
        return elementDisplay[nodeName]
    }

    function children(element) {
        return 'children' in element ?
          slice.call(element.children) :
          $.map(element.childNodes, function (node) { if (node.nodeType == 1) return node })
    }

    // `$.zepto.fragment` takes a html string and an optional tag name
    // to generate DOM nodes nodes from the given html string.
    // The generated DOM nodes are returned as an array.
    // This function can be overriden in plugins for example to make
    // it compatible with browsers that don't support the DOM fully.
    zepto.fragment = function (html, name, properties) {
        if (html.replace) html = html.replace(tagExpanderRE, "<$1></$2>")
        if (name === undefined) name = fragmentRE.test(html) && RegExp.$1
        if (!(name in containers)) name = '*'

        var nodes, dom, container = containers[name]
        container.innerHTML = '' + html
        dom = $.each(slice.call(container.childNodes), function () {
            container.removeChild(this)
        })
        if (isPlainObject(properties)) {
            nodes = $(dom)
            $.each(properties, function (key, value) {
                if (methodAttributes.indexOf(key) > -1) nodes[key](value)
                else nodes.attr(key, value)
            })
        }
        return dom
    }

    // `$.zepto.Z` swaps out the prototype of the given `dom` array
    // of nodes with `$.fn` and thus supplying all the Zepto functions
    // to the array. Note that `__proto__` is not supported on Internet
    // Explorer. This method can be overriden in plugins.
    zepto.Z = function (dom, selector) {
        dom = dom || []
        dom.__proto__ = $.fn
        dom.selector = selector || ''
        return dom
    }

    // `$.zepto.isZ` should return `true` if the given object is a Zepto
    // collection. This method can be overriden in plugins.
    zepto.isZ = function (object) {
        return object instanceof zepto.Z
    }

    // `$.zepto.init` is Zepto's counterpart to jQuery's `$.fn.init` and
    // takes a CSS selector and an optional context (and handles various
    // special cases).
    // This method can be overriden in plugins.
    zepto.init = function (selector, context) {
        // If nothing given, return an empty Zepto collection
        if (!selector) return zepto.Z()
            // If a function is given, call it when the DOM is ready
        else if (isFunction(selector)) return $(document).ready(selector)
            // If a Zepto collection is given, juts return it
        else if (zepto.isZ(selector)) return selector
        else {
            var dom
            // normalize array if an array of nodes is given
            if (isArray(selector)) dom = compact(selector)
                // Wrap DOM nodes. If a plain object is given, duplicate it.
            else if (isObject(selector))
                dom = [isPlainObject(selector) ? $.extend({}, selector) : selector], selector = null
                // If it's a html fragment, create nodes from it
            else if (fragmentRE.test(selector))
                dom = zepto.fragment(selector.trim(), RegExp.$1, context), selector = null
                // If there's a context, create a collection on that context first, and select
                // nodes from there
            else if (context !== undefined) return $(context).find(selector)
                // And last but no least, if it's a CSS selector, use it to select nodes.
            else dom = zepto.qsa(document, selector)
            // create a new Zepto collection from the nodes found
            return zepto.Z(dom, selector)
        }
    }

    // `$` will be the base `Zepto` object. When calling this
    // function just call `$.zepto.init, which makes the implementation
    // details of selecting nodes and creating Zepto collections
    // patchable in plugins.
    $ = function (selector, context) {
        return zepto.init(selector, context)
    }

    function extend(target, source, deep) {
        for (key in source)
            if (deep && (isPlainObject(source[key]) || isArray(source[key]))) {
                if (isPlainObject(source[key]) && !isPlainObject(target[key]))
                    target[key] = {}
                if (isArray(source[key]) && !isArray(target[key]))
                    target[key] = []
                extend(target[key], source[key], deep)
            }
            else if (source[key] !== undefined) target[key] = source[key]
    }

    // Copy all but undefined properties from one or more
    // objects to the `target` object.
    $.extend = function (target) {
        var deep, args = slice.call(arguments, 1)
        if (typeof target == 'boolean') {
            deep = target
            target = args.shift()
        }
        args.forEach(function (arg) { extend(target, arg, deep) })
        return target
    }

    // `$.zepto.qsa` is Zepto's CSS selector implementation which
    // uses `document.querySelectorAll` and optimizes for some special cases, like `#id`.
    // This method can be overriden in plugins.
    zepto.qsa = function (element, selector) {
        var found
        return (isDocument(element) && idSelectorRE.test(selector)) ?
          ((found = element.getElementById(RegExp.$1)) ? [found] : []) :
          (element.nodeType !== 1 && element.nodeType !== 9) ? [] :
          slice.call(
            classSelectorRE.test(selector) ? element.getElementsByClassName(RegExp.$1) :
            tagSelectorRE.test(selector) ? element.getElementsByTagName(selector) :
            element.querySelectorAll(selector)
          )
    }

    function filtered(nodes, selector) {
        return selector === undefined ? $(nodes) : $(nodes).filter(selector)
    }

    $.contains = function (parent, node) {
        return parent !== node && parent.contains(node)
    }

    function funcArg(context, arg, idx, payload) {
        return isFunction(arg) ? arg.call(context, idx, payload) : arg
    }

    function setAttribute(node, name, value) {
        value == null ? node.removeAttribute(name) : node.setAttribute(name, value)
    }

    // access className property while respecting SVGAnimatedString
    function className(node, value) {
        var klass = node.className,
            svg = klass && klass.baseVal !== undefined

        if (value === undefined) return svg ? klass.baseVal : klass
        svg ? (klass.baseVal = value) : (node.className = value)
    }

    // "true"  => true
    // "false" => false
    // "null"  => null
    // "42"    => 42
    // "42.5"  => 42.5
    // JSON    => parse if valid
    // String  => self
    function deserializeValue(value) {
        var num
        try {
            return value ?
              value == "true" ||
              (value == "false" ? false :
                value == "null" ? null :
                !isNaN(num = Number(value)) ? num :
                /^[\[\{]/.test(value) ? $.parseJSON(value) :
                value)
              : value
        } catch (e) {
            return value
        }
    }

    $.type = type
    $.isFunction = isFunction
    $.isWindow = isWindow
    $.isArray = isArray
    $.isPlainObject = isPlainObject

    $.isEmptyObject = function (obj) {
        var name
        for (name in obj) return false
        return true
    }

    $.inArray = function (elem, array, i) {
        return emptyArray.indexOf.call(array, elem, i)
    }

    $.camelCase = camelize
    $.trim = function (str) { return str.trim() }

    // plugin compatibility
    $.uuid = 0
    $.support = {}
    $.expr = {}

    $.map = function (elements, callback) {
        var value, values = [], i, key
        if (likeArray(elements))
            for (i = 0; i < elements.length; i++) {
                value = callback(elements[i], i)
                if (value != null) values.push(value)
            }
        else
            for (key in elements) {
                value = callback(elements[key], key)
                if (value != null) values.push(value)
            }
        return flatten(values)
    }

    $.each = function (elements, callback) {
        var i, key
        if (likeArray(elements)) {
            for (i = 0; i < elements.length; i++)
                if (callback.call(elements[i], i, elements[i]) === false) return elements
        } else {
            for (key in elements)
                if (callback.call(elements[key], key, elements[key]) === false) return elements
        }

        return elements
    }

    $.grep = function (elements, callback) {
        return filter.call(elements, callback)
    }

    if (window.JSON) $.parseJSON = JSON.parse

    // Populate the class2type map
    $.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function (i, name) {
        class2type["[object " + name + "]"] = name.toLowerCase()
    })

    // Define methods that will be available on all
    // Zepto collections
    $.fn = {
        // Because a collection acts like an array
        // copy over these useful array functions.
        forEach: emptyArray.forEach,
        reduce: emptyArray.reduce,
        push: emptyArray.push,
        sort: emptyArray.sort,
        indexOf: emptyArray.indexOf,
        concat: emptyArray.concat,

        // `map` and `slice` in the jQuery API work differently
        // from their array counterparts
        map: function (fn) {
            return $($.map(this, function (el, i) { return fn.call(el, i, el) }))
        },
        slice: function () {
            return $(slice.apply(this, arguments))
        },

        ready: function (callback) {
            if (readyRE.test(document.readyState)) callback($)
            else document.addEventListener('DOMContentLoaded', function () { callback($) }, false)
            return this
        },
        get: function (idx) {
            return idx === undefined ? slice.call(this) : this[idx >= 0 ? idx : idx + this.length]
        },
        toArray: function () { return this.get() },
        size: function () {
            return this.length
        },
        remove: function () {
            return this.each(function () {
                if (this.parentNode != null)
                    this.parentNode.removeChild(this)
            })
        },
        each: function (callback) {
            emptyArray.every.call(this, function (el, idx) {
                return callback.call(el, idx, el) !== false
            })
            return this
        },
        filter: function (selector) {
            if (isFunction(selector)) return this.not(this.not(selector))
            return $(filter.call(this, function (element) {
                return zepto.matches(element, selector)
            }))
        },
        add: function (selector, context) {
            return $(uniq(this.concat($(selector, context))))
        },
        is: function (selector) {
            return this.length > 0 && zepto.matches(this[0], selector)
        },
        not: function (selector) {
            var nodes = []
            if (isFunction(selector) && selector.call !== undefined)
                this.each(function (idx) {
                    if (!selector.call(this, idx)) nodes.push(this)
                })
            else {
                var excludes = typeof selector == 'string' ? this.filter(selector) :
                  (likeArray(selector) && isFunction(selector.item)) ? slice.call(selector) : $(selector)
                this.forEach(function (el) {
                    if (excludes.indexOf(el) < 0) nodes.push(el)
                })
            }
            return $(nodes)
        },
        has: function (selector) {
            return this.filter(function () {
                return isObject(selector) ?
                  $.contains(this, selector) :
                  $(this).find(selector).size()
            })
        },
        eq: function (idx) {
            return idx === -1 ? this.slice(idx) : this.slice(idx, +idx + 1)
        },
        first: function () {
            var el = this[0]
            return el && !isObject(el) ? el : $(el)
        },
        last: function () {
            var el = this[this.length - 1]
            return el && !isObject(el) ? el : $(el)
        },
        find: function (selector) {
            var result, $this = this
            if (typeof selector == 'object')
                result = $(selector).filter(function () {
                    var node = this
                    return emptyArray.some.call($this, function (parent) {
                        return $.contains(parent, node)
                    })
                })
            else if (this.length == 1) result = $(zepto.qsa(this[0], selector))
            else result = this.map(function () { return zepto.qsa(this, selector) })
            return result
        },
        closest: function (selector, context) {
            var node = this[0], collection = false
            if (typeof selector == 'object') collection = $(selector)
            while (node && !(collection ? collection.indexOf(node) >= 0 : zepto.matches(node, selector)))
                node = node !== context && !isDocument(node) && node.parentNode
            return $(node)
        },
        parents: function (selector) {
            var ancestors = [], nodes = this
            while (nodes.length > 0)
                nodes = $.map(nodes, function (node) {
                    if ((node = node.parentNode) && !isDocument(node) && ancestors.indexOf(node) < 0) {
                        ancestors.push(node)
                        return node
                    }
                })
            return filtered(ancestors, selector)
        },
        parent: function (selector) {
            return filtered(uniq(this.pluck('parentNode')), selector)
        },
        children: function (selector) {
            return filtered(this.map(function () { return children(this) }), selector)
        },
        contents: function () {
            return this.map(function () { return slice.call(this.childNodes) })
        },
        siblings: function (selector) {
            return filtered(this.map(function (i, el) {
                return filter.call(children(el.parentNode), function (child) { return child !== el })
            }), selector)
        },
        empty: function () {
            return this.each(function () { this.innerHTML = '' })
        },
        // `pluck` is borrowed from Prototype.js
        pluck: function (property) {
            return $.map(this, function (el) { return el[property] })
        },
        show: function () {
            return this.each(function () {
                this.style.display == "none" && (this.style.display = null)
                if (getComputedStyle(this, '').getPropertyValue("display") == "none")
                    this.style.display = defaultDisplay(this.nodeName)
            })
        },
        replaceWith: function (newContent) {
            return this.before(newContent).remove()
        },
        wrap: function (structure) {
            var func = isFunction(structure)
            if (this[0] && !func)
                var dom = $(structure).get(0),
                    clone = dom.parentNode || this.length > 1

            return this.each(function (index) {
                $(this).wrapAll(
                  func ? structure.call(this, index) :
                    clone ? dom.cloneNode(true) : dom
                )
            })
        },
        wrapAll: function (structure) {
            if (this[0]) {
                $(this[0]).before(structure = $(structure))
                var children
                // drill down to the inmost element
                while ((children = structure.children()).length) structure = children.first()
                $(structure).append(this)
            }
            return this
        },
        wrapInner: function (structure) {
            var func = isFunction(structure)
            return this.each(function (index) {
                var self = $(this), contents = self.contents(),
                    dom = func ? structure.call(this, index) : structure
                contents.length ? contents.wrapAll(dom) : self.append(dom)
            })
        },
        unwrap: function () {
            this.parent().each(function () {
                $(this).replaceWith($(this).children())
            })
            return this
        },
        clone: function () {
            return this.map(function () { return this.cloneNode(true) })
        },
        hide: function () {
            return this.css("display", "none")
        },
        toggle: function (setting) {
            return this.each(function () {
                var el = $(this)
                ; (setting === undefined ? el.css("display") == "none" : setting) ? el.show() : el.hide()
            })
        },
        slideDown: function (duration) {

            // get the element position to restore it then
            var position = this.css('position');

            // show element if it is hidden
            this.show();

            // place it so it displays as usually but hidden
            this.css({
                position: 'absolute',
                visibility: 'hidden'
            });

            // get naturally height, margin, padding
            var marginTop = this.css('margin-top');
            var marginBottom = this.css('margin-bottom');
            var paddingTop = this.css('padding-top');
            var paddingBottom = this.css('padding-bottom');
            var height = this.css('height');

            // set initial css for animation
            this.css({
                position: position,
                visibility: 'visible',
                overflow: 'hidden',
                height: 0,
                marginTop: 0,
                marginBottom: 0,
                paddingTop: 0,
                paddingBottom: 0
            });

            // animate to gotten height, margin and padding
            this.animate({
                height: height,
                marginTop: marginTop,
                marginBottom: marginBottom,
                paddingTop: paddingTop,
                paddingBottom: paddingBottom
            }, duration);

        },
        slideUp: function (duration) {

            // active the function only if the element is visible
            if (this.height() > 0) {

                var target = this;

                // get the element position to restore it then
                var position = target.css('position');

                // get the element height, margin and padding to restore them then
                var height = target.css('height');
                var marginTop = target.css('margin-top');
                var marginBottom = target.css('margin-bottom');
                var paddingTop = target.css('padding-top');
                var paddingBottom = target.css('padding-bottom');

                // set initial css for animation
                this.css({
                    visibility: 'visible',
                    overflow: 'hidden',
                    height: height,
                    marginTop: marginTop,
                    marginBottom: marginBottom,
                    paddingTop: paddingTop,
                    paddingBottom: paddingBottom
                });

                // animate element height, margin and padding to zero
                target.animate({
                    height: 0,
                    marginTop: 0,
                    marginBottom: 0,
                    paddingTop: 0,
                    paddingBottom: 0
                },
                    {
                        // callback : restore the element position, height, margin and padding to original values
                        duration: duration,
                        queue: false,
                        complete: function () {
                            target.hide();
                            target.css({
                                visibility: 'visible',
                                overflow: 'hidden',
                                height: height,
                                marginTop: marginTop,
                                marginBottom: marginBottom,
                                paddingTop: paddingTop,
                                paddingBottom: paddingBottom
                            });
                        }
                    });
            }
        },
        slideToggle: function (duration) {

            // if the element is hidden, slideDown !
            if (this.height() == 0) {
                this.slideDown();
            }
                // if the element is visible, slideUp !
            else {
                this.slideUp();
            }
        },
        prev: function (selector) { return $(this.pluck('previousElementSibling')).filter(selector || '*') },
        next: function (selector) { return $(this.pluck('nextElementSibling')).filter(selector || '*') },
        html: function (html) {
            return html === undefined ?
              (this.length > 0 ? this[0].innerHTML : null) :
              this.each(function (idx) {
                  var originHtml = this.innerHTML
                  $(this).empty().append(funcArg(this, html, idx, originHtml))
              })
        },
        text: function (text) {
            return text === undefined ?
              (this.length > 0 ? this[0].textContent : null) :
              this.each(function () { this.textContent = text })
        },
        attr: function (name, value) {
            var result
            return (typeof name == 'string' && value === undefined) ?
              (this.length == 0 || this[0].nodeType !== 1 ? undefined :
                (name == 'value' && this[0].nodeName == 'INPUT') ? this.val() :
                (!(result = this[0].getAttribute(name)) && name in this[0]) ? this[0][name] : result
              ) :
              this.each(function (idx) {
                  if (this.nodeType !== 1) return
                  if (isObject(name)) for (key in name) setAttribute(this, key, name[key])
                  else setAttribute(this, name, funcArg(this, value, idx, this.getAttribute(name)))
              })
        },
        removeAttr: function (name) {
            return this.each(function () { this.nodeType === 1 && setAttribute(this, name) })
        },
        prop: function (name, value) {
            return (value === undefined) ?
              (this[0] && this[0][name]) :
              this.each(function (idx) {
                  this[name] = funcArg(this, value, idx, this[name])
              })
        },
        data: function (name, value) {
            var data = this.attr('data-' + dasherize(name), value)
            return data !== null ? deserializeValue(data) : undefined
        },
        val: function (value) {
            return (value === undefined) ?
              (this[0] && (this[0].multiple ?
                 $(this[0]).find('option').filter(function (o) { return this.selected }).pluck('value') :
                 this[0].value)
              ) :
              this.each(function (idx) {
                  this.value = funcArg(this, value, idx, this.value)
              })
        },
        offset: function (coordinates) {
            if (coordinates) return this.each(function (index) {
                var $this = $(this),
                    coords = funcArg(this, coordinates, index, $this.offset()),
                    parentOffset = $this.offsetParent().offset(),
                    props = {
                        top: coords.top - parentOffset.top,
                        left: coords.left - parentOffset.left
                    }

                if ($this.css('position') == 'static') props['position'] = 'relative'
                $this.css(props)
            })
            if (this.length == 0) return null
            var obj = this[0].getBoundingClientRect()
            return {
                left: obj.left + window.pageXOffset,
                top: obj.top + window.pageYOffset,
                width: Math.round(obj.width),
                height: Math.round(obj.height)
            }
        },
        css: function (property, value) {
            if (arguments.length < 2 && typeof property == 'string')
                return this[0] && (this[0].style[camelize(property)] || getComputedStyle(this[0], '').getPropertyValue(property))

            var css = ''
            if (type(property) == 'string') {
                if (!value && value !== 0)
                    this.each(function () { this.style.removeProperty(dasherize(property)) })
                else
                    css = dasherize(property) + ":" + maybeAddPx(property, value)
            } else {
                for (key in property)
                    if (!property[key] && property[key] !== 0)
                        this.each(function () { this.style.removeProperty(dasherize(key)) })
                    else
                        css += dasherize(key) + ':' + maybeAddPx(key, property[key]) + ';'
            }

            return this.each(function () { this.style.cssText += ';' + css })
        },
        index: function (element) {
            return element ? this.indexOf($(element)[0]) : this.parent().children().indexOf(this[0])
        },
        hasClass: function (name) {
            return emptyArray.some.call(this, function (el) {
                return this.test(className(el))
            }, classRE(name))
        },
        addClass: function (name) {
            return this.each(function (idx) {
                classList = []
                var cls = className(this), newName = funcArg(this, name, idx, cls)
                newName.split(/\s+/g).forEach(function (klass) {
                    if (!$(this).hasClass(klass)) classList.push(klass)
                }, this)
                classList.length && className(this, cls + (cls ? " " : "") + classList.join(" "))
            })
        },
        removeClass: function (name) {
            return this.each(function (idx) {
                if (name === undefined) return className(this, '')
                classList = className(this)
                funcArg(this, name, idx, classList).split(/\s+/g).forEach(function (klass) {
                    classList = classList.replace(classRE(klass), " ")
                })
                className(this, classList.trim())
            })
        },
        toggleClass: function (name, when) {
            return this.each(function (idx) {
                var $this = $(this), names = funcArg(this, name, idx, className(this))
                names.split(/\s+/g).forEach(function (klass) {
                    (when === undefined ? !$this.hasClass(klass) : when) ?
                      $this.addClass(klass) : $this.removeClass(klass)
                })
            })
        },
        scrollTop: function () {
            if (!this.length) return
            return ('scrollTop' in this[0]) ? this[0].scrollTop : this[0].scrollY
        },
        position: function () {
            if (!this.length) return

            var elem = this[0],
              // Get *real* offsetParent
              offsetParent = this.offsetParent(),
              // Get correct offsets
              offset = this.offset(),
              parentOffset = rootNodeRE.test(offsetParent[0].nodeName) ? { top: 0, left: 0 } : offsetParent.offset()

            // Subtract element margins
            // note: when an element has margin: auto the offsetLeft and marginLeft
            // are the same in Safari causing offset.left to incorrectly be 0
            offset.top -= parseFloat($(elem).css('margin-top')) || 0
            offset.left -= parseFloat($(elem).css('margin-left')) || 0

            // Add offsetParent borders
            parentOffset.top += parseFloat($(offsetParent[0]).css('border-top-width')) || 0
            parentOffset.left += parseFloat($(offsetParent[0]).css('border-left-width')) || 0

            // Subtract the two offsets
            return {
                top: offset.top - parentOffset.top,
                left: offset.left - parentOffset.left
            }
        },
        offsetParent: function () {
            return this.map(function () {
                var parent = this.offsetParent || document.body
                while (parent && !rootNodeRE.test(parent.nodeName) && $(parent).css("position") == "static")
                    parent = parent.offsetParent
                return parent
            })
        }
    }

    // for now
    $.fn.detach = $.fn.remove

    // Generate the `width` and `height` functions
    ;['width', 'height'].forEach(function (dimension) {
        $.fn[dimension] = function (value) {
            var offset, el = this[0],
              Dimension = dimension.replace(/./, function (m) { return m[0].toUpperCase() })
            if (value === undefined) return isWindow(el) ? el['inner' + Dimension] :
              isDocument(el) ? el.documentElement['offset' + Dimension] :
              (offset = this.offset()) && offset[dimension]
            else return this.each(function (idx) {
                el = $(this)
                el.css(dimension, funcArg(this, value, idx, el[dimension]()))
            })
        }
    })

    function traverseNode(node, fun) {
        fun(node)
        for (var key in node.childNodes) traverseNode(node.childNodes[key], fun)
    }

    // Generate the `after`, `prepend`, `before`, `append`,
    // `insertAfter`, `insertBefore`, `appendTo`, and `prependTo` methods.
    adjacencyOperators.forEach(function (operator, operatorIndex) {
        var inside = operatorIndex % 2 //=> prepend, append

        $.fn[operator] = function () {
            // arguments can be nodes, arrays of nodes, Zepto objects and HTML strings
            var argType, nodes = $.map(arguments, function (arg) {
                argType = type(arg)
                return argType == "object" || argType == "array" || arg == null ?
                    arg : zepto.fragment(arg)
            }),
                parent, copyByClone = this.length > 1
            if (nodes.length < 1) return this

            return this.each(function (_, target) {
                parent = inside ? target : target.parentNode

                // convert all methods to a "before" operation
                target = operatorIndex == 0 ? target.nextSibling :
                         operatorIndex == 1 ? target.firstChild :
                         operatorIndex == 2 ? target :
                         null

                nodes.forEach(function (node) {
                    if (copyByClone) node = node.cloneNode(true)
                    else if (!parent) return $(node).remove()

                    traverseNode(parent.insertBefore(node, target), function (el) {
                        if (el.nodeName != null && el.nodeName.toUpperCase() === 'SCRIPT' &&
                           (!el.type || el.type === 'text/javascript') && !el.src)
                            window['eval'].call(window, el.innerHTML)
                    })
                })
            })
        }

        // after    => insertAfter
        // prepend  => prependTo
        // before   => insertBefore
        // append   => appendTo
        $.fn[inside ? operator + 'To' : 'insert' + (operatorIndex ? 'Before' : 'After')] = function (html) {
            $(html)[operator](this)
            return this
        }
    })

    zepto.Z.prototype = $.fn

    // Export internal API functions in the `$.zepto` namespace
    zepto.uniq = uniq
    zepto.deserializeValue = deserializeValue
    $.zepto = zepto

    return $
})()

window.Zepto = Zepto
'$' in window || (window.$ = Zepto)

; (function ($) {
    function detect(ua) {
        var os = this.os = {}, browser = this.browser = {},
          webkit = ua.match(/WebKit\/([\d.]+)/),
          android = ua.match(/(Android)\s+([\d.]+)/),
          ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
          iphone = !ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
          webos = ua.match(/(webOS|hpwOS)[\s\/]([\d.]+)/),
          touchpad = webos && ua.match(/TouchPad/),
          kindle = ua.match(/Kindle\/([\d.]+)/),
          silk = ua.match(/Silk\/([\d._]+)/),
          blackberry = ua.match(/(BlackBerry).*Version\/([\d.]+)/),
          bb10 = ua.match(/(BB10).*Version\/([\d.]+)/),
          rimtabletos = ua.match(/(RIM\sTablet\sOS)\s([\d.]+)/),
          playbook = ua.match(/PlayBook/),
          chrome = ua.match(/Chrome\/([\d.]+)/) || ua.match(/CriOS\/([\d.]+)/),
          firefox = ua.match(/Firefox\/([\d.]+)/)

        // Todo: clean this up with a better OS/browser seperation:
        // - discern (more) between multiple browsers on android
        // - decide if kindle fire in silk mode is android or not
        // - Firefox on Android doesn't specify the Android version
        // - possibly devide in os, device and browser hashes

        if (browser.webkit = !!webkit) browser.version = webkit[1]

        if (android) os.android = true, os.version = android[2]
        if (iphone) os.ios = os.iphone = true, os.version = iphone[2].replace(/_/g, '.')
        if (ipad) os.ios = os.ipad = true, os.version = ipad[2].replace(/_/g, '.')
        if (webos) os.webos = true, os.version = webos[2]
        if (touchpad) os.touchpad = true
        if (blackberry) os.blackberry = true, os.version = blackberry[2]
        if (bb10) os.bb10 = true, os.version = bb10[2]
        if (rimtabletos) os.rimtabletos = true, os.version = rimtabletos[2]
        if (playbook) browser.playbook = true
        if (kindle) os.kindle = true, os.version = kindle[1]
        if (silk) browser.silk = true, browser.version = silk[1]
        if (!silk && os.android && ua.match(/Kindle Fire/)) browser.silk = true
        if (chrome) browser.chrome = true, browser.version = chrome[1]
        if (firefox) browser.firefox = true, browser.version = firefox[1]

        os.tablet = !!(ipad || playbook || (android && !ua.match(/Mobile/)) || (firefox && ua.match(/Tablet/)))
        os.phone = !!(!os.tablet && (android || iphone || webos || blackberry || bb10 ||
          (chrome && ua.match(/Android/)) || (chrome && ua.match(/CriOS\/([\d.]+)/)) || (firefox && ua.match(/Mobile/))))
    }

    detect.call($, navigator.userAgent)
    // make available to unit tests
    $.__detect = detect

})(Zepto)

; (function ($) {
    var $$ = $.zepto.qsa, handlers = {}, _zid = 1, specialEvents = {},
        hover = { mouseenter: 'mouseover', mouseleave: 'mouseout' }

    specialEvents.click = specialEvents.mousedown = specialEvents.mouseup = specialEvents.mousemove = 'MouseEvents'

    function zid(element) {
        return element._zid || (element._zid = _zid++)
    }
    function findHandlers(element, event, fn, selector) {
        event = parse(event)
        if (event.ns) var matcher = matcherFor(event.ns)
        return (handlers[zid(element)] || []).filter(function (handler) {
            return handler
              && (!event.e || handler.e == event.e)
              && (!event.ns || matcher.test(handler.ns))
              && (!fn || zid(handler.fn) === zid(fn))
              && (!selector || handler.sel == selector)
        })
    }
    function parse(event) {
        var parts = ('' + event).split('.')
        return { e: parts[0], ns: parts.slice(1).sort().join(' ') }
    }
    function matcherFor(ns) {
        return new RegExp('(?:^| )' + ns.replace(' ', ' .* ?') + '(?: |$)')
    }

    function eachEvent(events, fn, iterator) {
        if ($.type(events) != "string") $.each(events, iterator)
        else events.split(/\s/).forEach(function (type) { iterator(type, fn) })
    }

    function eventCapture(handler, captureSetting) {
        return handler.del &&
          (handler.e == 'focus' || handler.e == 'blur') ||
          !!captureSetting
    }

    function realEvent(type) {
        return hover[type] || type
    }

    function add(element, events, fn, selector, getDelegate, capture) {
        var id = zid(element), set = (handlers[id] || (handlers[id] = []))
        eachEvent(events, fn, function (event, fn) {
            var handler = parse(event)
            handler.fn = fn
            handler.sel = selector
            // emulate mouseenter, mouseleave
            if (handler.e in hover) fn = function (e) {
                var related = e.relatedTarget
                if (!related || (related !== this && !$.contains(this, related)))
                    return handler.fn.apply(this, arguments)
            }
            handler.del = getDelegate && getDelegate(fn, event)
            var callback = handler.del || fn
            handler.proxy = function (e) {
                var result = callback.apply(element, [e].concat(e.data))
                if (result === false) e.preventDefault(), e.stopPropagation()
                return result
            }
            handler.i = set.length
            set.push(handler)
            element.addEventListener(realEvent(handler.e), handler.proxy, eventCapture(handler, capture))
        })
    }
    function remove(element, events, fn, selector, capture) {
        var id = zid(element)
        eachEvent(events || '', fn, function (event, fn) {
            findHandlers(element, event, fn, selector).forEach(function (handler) {
                delete handlers[id][handler.i]
                element.removeEventListener(realEvent(handler.e), handler.proxy, eventCapture(handler, capture))
            })
        })
    }

    $.event = { add: add, remove: remove }

    $.proxy = function (fn, context) {
        if ($.isFunction(fn)) {
            var proxyFn = function () { return fn.apply(context, arguments) }
            proxyFn._zid = zid(fn)
            return proxyFn
        } else if (typeof context == 'string') {
            return $.proxy(fn[context], fn)
        } else {
            throw new TypeError("expected function")
        }
    }

    $.fn.bind = function (event, callback) {
        return this.each(function () {
            add(this, event, callback)
        })
    }
    $.fn.unbind = function (event, callback) {
        return this.each(function () {
            remove(this, event, callback)
        })
    }
    $.fn.one = function (event, callback) {
        return this.each(function (i, element) {
            add(this, event, callback, null, function (fn, type) {
                return function () {
                    var result = fn.apply(element, arguments)
                    remove(element, type, fn)
                    return result
                }
            })
        })
    }

    var returnTrue = function () { return true },
        returnFalse = function () { return false },
        ignoreProperties = /^([A-Z]|layer[XY]$)/,
        eventMethods = {
            preventDefault: 'isDefaultPrevented',
            stopImmediatePropagation: 'isImmediatePropagationStopped',
            stopPropagation: 'isPropagationStopped'
        }
    function createProxy(event) {
        var key, proxy = { originalEvent: event }
        for (key in event)
            if (!ignoreProperties.test(key) && event[key] !== undefined) proxy[key] = event[key]

        $.each(eventMethods, function (name, predicate) {
            proxy[name] = function () {
                this[predicate] = returnTrue
                return event[name].apply(event, arguments)
            }
            proxy[predicate] = returnFalse
        })
        return proxy
    }

    // emulates the 'defaultPrevented' property for browsers that have none
    function fix(event) {
        if (!('defaultPrevented' in event)) {
            event.defaultPrevented = false
            var prevent = event.preventDefault
            event.preventDefault = function () {
                this.defaultPrevented = true
                prevent.call(this)
            }
        }
    }

    $.fn.delegate = function (selector, event, callback) {
        return this.each(function (i, element) {
            add(element, event, callback, selector, function (fn) {
                return function (e) {
                    var evt, match = $(e.target).closest(selector, element).get(0)
                    if (match) {
                        evt = $.extend(createProxy(e), { currentTarget: match, liveFired: element })
                        return fn.apply(match, [evt].concat([].slice.call(arguments, 1)))
                    }
                }
            })
        })
    }
    $.fn.undelegate = function (selector, event, callback) {
        return this.each(function () {
            remove(this, event, callback, selector)
        })
    }

    $.fn.live = function (event, callback) {
        $(document.body).delegate(this.selector, event, callback)
        return this
    }
    $.fn.die = function (event, callback) {
        $(document.body).undelegate(this.selector, event, callback)
        return this
    }

    $.fn.on = function (event, selector, callback) {
        return !selector || $.isFunction(selector) ?
          this.bind(event, selector || callback) : this.delegate(selector, event, callback)
    }
    $.fn.off = function (event, selector, callback) {
        return !selector || $.isFunction(selector) ?
          this.unbind(event, selector || callback) : this.undelegate(selector, event, callback)
    }

    $.fn.trigger = function (event, data) {
        if (typeof event == 'string' || $.isPlainObject(event)) event = $.Event(event)
        fix(event)
        event.data = data
        return this.each(function () {
            // items in the collection might not be DOM elements
            // (todo: possibly support events on plain old objects)
            if ('dispatchEvent' in this) this.dispatchEvent(event)
        })
    }

    // triggers event handlers on current element just as if an event occurred,
    // doesn't trigger an actual event, doesn't bubble
    $.fn.triggerHandler = function (event, data) {
        var e, result
        this.each(function (i, element) {
            e = createProxy(typeof event == 'string' ? $.Event(event) : event)
            e.data = data
            e.target = element
            $.each(findHandlers(element, event.type || event), function (i, handler) {
                result = handler.proxy(e)
                if (e.isImmediatePropagationStopped()) return false
            })
        })
        return result
    }

    // shortcut methods for `.bind(event, fn)` for each event type
    ; ('focusin focusout load resize scroll unload click dblclick ' +
    'mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave ' +
    'change select keydown keypress keyup error').split(' ').forEach(function (event) {
        $.fn[event] = function (callback) {
            return callback ?
              this.bind(event, callback) :
              this.trigger(event)
        }
    })

    ;['focus', 'blur'].forEach(function (name) {
        $.fn[name] = function (callback) {
            if (callback) this.bind(name, callback)
            else this.each(function () {
                try { this[name]() }
                catch (e) { }
            })
            return this
        }
    })

    $.Event = function (type, props) {
        if (typeof type != 'string') props = type, type = props.type
        var event = document.createEvent(specialEvents[type] || 'Events'), bubbles = true
        if (props) for (var name in props) (name == 'bubbles') ? (bubbles = !!props[name]) : (event[name] = props[name])
        event.initEvent(type, bubbles, true, null, null, null, null, null, null, null, null, null, null, null, null)
        event.isDefaultPrevented = function () { return this.defaultPrevented }
        return event
    }

})(Zepto)

; (function ($) {
    var jsonpID = 0,
        document = window.document,
        key,
        name,
        rscript = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
        scriptTypeRE = /^(?:text|application)\/javascript/i,
        xmlTypeRE = /^(?:text|application)\/xml/i,
        jsonType = 'application/json',
        htmlType = 'text/html',
        blankRE = /^\s*$/

    // trigger a custom event and return false if it was cancelled
    function triggerAndReturn(context, eventName, data) {
        var event = $.Event(eventName)
        $(context).trigger(event, data)
        return !event.defaultPrevented
    }

    // trigger an Ajax "global" event
    function triggerGlobal(settings, context, eventName, data) {
        if (settings.global) return triggerAndReturn(context || document, eventName, data)
    }

    // Number of active Ajax requests
    $.active = 0

    function ajaxStart(settings) {
        if (settings.global && $.active++ === 0) triggerGlobal(settings, null, 'ajaxStart')
    }
    function ajaxStop(settings) {
        if (settings.global && !(--$.active)) triggerGlobal(settings, null, 'ajaxStop')
    }

    // triggers an extra global event "ajaxBeforeSend" that's like "ajaxSend" but cancelable
    function ajaxBeforeSend(xhr, settings) {
        var context = settings.context
        if (settings.beforeSend.call(context, xhr, settings) === false ||
            triggerGlobal(settings, context, 'ajaxBeforeSend', [xhr, settings]) === false)
            return false

        triggerGlobal(settings, context, 'ajaxSend', [xhr, settings])
    }
    function ajaxSuccess(data, xhr, settings) {
        var context = settings.context, status = 'success'
        settings.success.call(context, data, status, xhr)
        triggerGlobal(settings, context, 'ajaxSuccess', [xhr, settings, data])
        ajaxComplete(status, xhr, settings)
    }
    // type: "timeout", "error", "abort", "parsererror"
    function ajaxError(error, type, xhr, settings) {
        var context = settings.context
        settings.error.call(context, xhr, type, error)
        triggerGlobal(settings, context, 'ajaxError', [xhr, settings, error])
        ajaxComplete(type, xhr, settings)
    }
    // status: "success", "notmodified", "error", "timeout", "abort", "parsererror"
    function ajaxComplete(status, xhr, settings) {
        var context = settings.context
        settings.complete.call(context, xhr, status)
        triggerGlobal(settings, context, 'ajaxComplete', [xhr, settings])
        ajaxStop(settings)
    }

    // Empty function, used as default callback
    function empty() { }

    $.ajaxJSONP = function (options) {
        if (!('type' in options)) return $.ajax(options)

        var callbackName = 'jsonp' + (++jsonpID),
          script = document.createElement('script'),
          cleanup = function () {
              clearTimeout(abortTimeout)
              $(script).remove()
              delete window[callbackName]
          },
          abort = function (type) {
              cleanup()
              // In case of manual abort or timeout, keep an empty function as callback
              // so that the SCRIPT tag that eventually loads won't result in an error.
              if (!type || type == 'timeout') window[callbackName] = empty
              ajaxError(null, type || 'abort', xhr, options)
          },
          xhr = { abort: abort }, abortTimeout

        if (ajaxBeforeSend(xhr, options) === false) {
            abort('abort')
            return false
        }

        window[callbackName] = function (data) {
            cleanup()
            ajaxSuccess(data, xhr, options)
        }

        script.onerror = function () { abort('error') }

        script.src = options.url.replace(/=\?/, '=' + callbackName)
        $('head').append(script)

        if (options.timeout > 0) abortTimeout = setTimeout(function () {
            abort('timeout')
        }, options.timeout)

        return xhr
    }

    $.ajaxSettings = {
        // Default type of request
        type: 'GET',
        // Callback that is executed before request
        beforeSend: empty,
        // Callback that is executed if the request succeeds
        success: empty,
        // Callback that is executed the the server drops error
        error: empty,
        // Callback that is executed on request complete (both: error and success)
        complete: empty,
        // The context for the callbacks
        context: null,
        // Whether to trigger "global" Ajax events
        global: true,
        // Transport
        xhr: function () {
            return new window.XMLHttpRequest()
        },
        // MIME types mapping
        accepts: {
            script: 'text/javascript, application/javascript',
            json: jsonType,
            xml: 'application/xml, text/xml',
            html: htmlType,
            text: 'text/plain'
        },
        // Whether the request is to another domain
        crossDomain: false,
        // Default timeout
        timeout: 0,
        // Whether data should be serialized to string
        processData: true,
        // Whether the browser should be allowed to cache GET responses
        cache: true,
    }

    function mimeToDataType(mime) {
        if (mime) mime = mime.split(';', 2)[0]
        return mime && (mime == htmlType ? 'html' :
          mime == jsonType ? 'json' :
          scriptTypeRE.test(mime) ? 'script' :
          xmlTypeRE.test(mime) && 'xml') || 'text'
    }

    function appendQuery(url, query) {
        return (url + '&' + query).replace(/[&?]{1,2}/, '?')
    }

    // serialize payload and append it to the URL for GET requests
    function serializeData(options) {
        if (options.processData && options.data && $.type(options.data) != "string")
            options.data = $.param(options.data, options.traditional)
        if (options.data && (!options.type || options.type.toUpperCase() == 'GET'))
            options.url = appendQuery(options.url, options.data)
    }

    $.ajax = function (options) {
        var settings = $.extend({}, options || {})
        for (key in $.ajaxSettings) if (settings[key] === undefined) settings[key] = $.ajaxSettings[key]

        ajaxStart(settings)

        if (!settings.crossDomain) settings.crossDomain = /^([\w-]+:)?\/\/([^\/]+)/.test(settings.url) &&
          RegExp.$2 != window.location.host

        if (!settings.url) settings.url = window.location.toString()
        serializeData(settings)
        if (settings.cache === false) settings.url = appendQuery(settings.url, '_=' + Date.now())

        var dataType = settings.dataType, hasPlaceholder = /=\?/.test(settings.url)
        if (dataType == 'jsonp' || hasPlaceholder) {
            if (!hasPlaceholder) settings.url = appendQuery(settings.url, 'callback=?')
            return $.ajaxJSONP(settings)
        }

        var mime = settings.accepts[dataType],
            baseHeaders = {},
            protocol = /^([\w-]+:)\/\//.test(settings.url) ? RegExp.$1 : window.location.protocol,
            xhr = settings.xhr(), abortTimeout

        if (!settings.crossDomain) baseHeaders['X-Requested-With'] = 'XMLHttpRequest'
        if (mime) {
            baseHeaders['Accept'] = mime
            if (mime.indexOf(',') > -1) mime = mime.split(',', 2)[0]
            xhr.overrideMimeType && xhr.overrideMimeType(mime)
        }
        if (settings.contentType || (settings.contentType !== false && settings.data && settings.type.toUpperCase() != 'GET'))
            baseHeaders['Content-Type'] = (settings.contentType || 'application/x-www-form-urlencoded')
        settings.headers = $.extend(baseHeaders, settings.headers || {})

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                xhr.onreadystatechange = empty;
                clearTimeout(abortTimeout)
                var result, error = false
                if ((xhr.status >= 200 && xhr.status < 300) || xhr.status == 304 || (xhr.status == 0 && protocol == 'file:')) {
                    dataType = dataType || mimeToDataType(xhr.getResponseHeader('content-type'))
                    result = xhr.responseText

                    try {
                        // http://perfectionkills.com/global-eval-what-are-the-options/
                        if (dataType == 'script') (1, eval)(result)
                        else if (dataType == 'xml') result = xhr.responseXML
                        else if (dataType == 'json') result = blankRE.test(result) ? null : $.parseJSON(result)
                    } catch (e) { error = e }

                    if (error) ajaxError(error, 'parsererror', xhr, settings)
                    else ajaxSuccess(result, xhr, settings)
                } else {
                    ajaxError(null, xhr.status ? 'error' : 'abort', xhr, settings)
                }
            }
        }

        var async = 'async' in settings ? settings.async : true
        xhr.open(settings.type, settings.url, async)

        for (name in settings.headers) xhr.setRequestHeader(name, settings.headers[name])

        if (ajaxBeforeSend(xhr, settings) === false) {
            xhr.abort()
            return false
        }

        if (settings.timeout > 0) abortTimeout = setTimeout(function () {
            xhr.onreadystatechange = empty
            xhr.abort()
            ajaxError(null, 'timeout', xhr, settings)
        }, settings.timeout)

        // avoid sending empty string (#319)
        xhr.send(settings.data ? settings.data : null)
        return xhr
    }

    // handle optional data/success arguments
    function parseArguments(url, data, success, dataType) {
        var hasData = !$.isFunction(data)
        return {
            url: url,
            data: hasData ? data : undefined,
            success: !hasData ? data : $.isFunction(success) ? success : undefined,
            dataType: hasData ? dataType || success : success
        }
    }

    $.get = function (url, data, success, dataType) {
        return $.ajax(parseArguments.apply(null, arguments))
    }

    $.post = function (url, data, success, dataType) {
        var options = parseArguments.apply(null, arguments)
        options.type = 'POST'
        return $.ajax(options)
    }

    $.getJSON = function (url, data, success) {
        var options = parseArguments.apply(null, arguments)
        options.dataType = 'json'
        return $.ajax(options)
    }

    $.fn.load = function (url, data, success) {
        if (!this.length) return this
        var self = this, parts = url.split(/\s/), selector,
            options = parseArguments(url, data, success),
            callback = options.success
        if (parts.length > 1) options.url = parts[0], selector = parts[1]
        options.success = function (response) {
            self.html(selector ?
              $('<div>').html(response.replace(rscript, "")).find(selector)
              : response)
            callback && callback.apply(self, arguments)
        }
        $.ajax(options)
        return this
    }

    var escape = encodeURIComponent

    function serialize(params, obj, traditional, scope) {
        var type, array = $.isArray(obj)
        $.each(obj, function (key, value) {
            type = $.type(value)
            if (scope) key = traditional ? scope : scope + '[' + (array ? '' : key) + ']'
            // handle data in serializeArray() format
            if (!scope && array) params.add(value.name, value.value)
                // recurse into nested objects
            else if (type == "array" || (!traditional && type == "object"))
                serialize(params, value, traditional, key)
            else params.add(key, value)
        })
    }

    $.param = function (obj, traditional) {
        var params = []
        params.add = function (k, v) { this.push(escape(k) + '=' + escape(v)) }
        serialize(params, obj, traditional)
        return params.join('&').replace(/%20/g, '+')
    }
})(Zepto)

; (function ($) {
    $.fn.serializeArray = function () {
        var result = [], el
        $(Array.prototype.slice.call(this.get(0).elements)).each(function () {
            el = $(this)
            var type = el.attr('type')
            if (this.nodeName.toLowerCase() != 'fieldset' &&
              !this.disabled && type != 'submit' && type != 'reset' && type != 'button' &&
              ((type != 'radio' && type != 'checkbox') || this.checked))
                result.push({
                    name: el.attr('name'),
                    value: el.val()
                })
        })
        return result
    }

    $.fn.serialize = function () {
        var result = []
        this.serializeArray().forEach(function (elm) {
            result.push(encodeURIComponent(elm.name) + '=' + encodeURIComponent(elm.value))
        })
        return result.join('&')
    }

    $.fn.submit = function (callback) {
        if (callback) this.bind('submit', callback)
        else if (this.length) {
            var event = $.Event('submit')
            this.eq(0).trigger(event)
            if (!event.defaultPrevented) this.get(0).submit()
        }
        return this
    }

})(Zepto)

; (function ($, undefined) {
    var prefix = '', eventPrefix, endEventName, endAnimationName,
      vendors = { Webkit: 'webkit', Moz: '', O: 'o', ms: 'MS' },
      document = window.document, testEl = document.createElement('div'),
      supportedTransforms = /^((translate|rotate|scale)(X|Y|Z|3d)?|matrix(3d)?|perspective|skew(X|Y)?)$/i,
      transform,
      transitionProperty, transitionDuration, transitionTiming,
      animationName, animationDuration, animationTiming,
      cssReset = {}

    function dasherize(str) { return downcase(str.replace(/([a-z])([A-Z])/, '$1-$2')) }
    function downcase(str) { return str.toLowerCase() }
    function normalizeEvent(name) { return eventPrefix ? eventPrefix + name : downcase(name) }

    $.each(vendors, function (vendor, event) {
        if (testEl.style[vendor + 'TransitionProperty'] !== undefined) {
            prefix = '-' + downcase(vendor) + '-'
            eventPrefix = event
            return false
        }
    })

    transform = prefix + 'transform'
    cssReset[transitionProperty = prefix + 'transition-property'] =
    cssReset[transitionDuration = prefix + 'transition-duration'] =
    cssReset[transitionTiming = prefix + 'transition-timing-function'] =
    cssReset[animationName = prefix + 'animation-name'] =
    cssReset[animationDuration = prefix + 'animation-duration'] =
    cssReset[animationTiming = prefix + 'animation-timing-function'] = ''

    $.fx = {
        off: (eventPrefix === undefined && testEl.style.transitionProperty === undefined),
        speeds: { _default: 400, fast: 200, slow: 600 },
        cssPrefix: prefix,
        transitionEnd: normalizeEvent('TransitionEnd'),
        animationEnd: normalizeEvent('AnimationEnd')
    }

    $.fn.animate = function (properties, duration, ease, callback) {
        if ($.isPlainObject(duration))
            ease = duration.easing, callback = duration.complete, duration = duration.duration
        if (duration) duration = (typeof duration == 'number' ? duration :
                        ($.fx.speeds[duration] || $.fx.speeds._default)) / 1000
        return this.anim(properties, duration, ease, callback)
    }

    $.fn.anim = function (properties, duration, ease, callback) {
        var key, cssValues = {}, cssProperties, transforms = '',
            that = this, wrappedCallback, endEvent = $.fx.transitionEnd

        if (duration === undefined) duration = 0.4
        if ($.fx.off) duration = 0

        if (typeof properties == 'string') {
            // keyframe animation
            cssValues[animationName] = properties
            cssValues[animationDuration] = duration + 's'
            cssValues[animationTiming] = (ease || 'linear')
            endEvent = $.fx.animationEnd
        } else {
            cssProperties = []
            // CSS transitions
            for (key in properties)
                if (supportedTransforms.test(key)) transforms += key + '(' + properties[key] + ') '
                else cssValues[key] = properties[key], cssProperties.push(dasherize(key))

            if (transforms) cssValues[transform] = transforms, cssProperties.push(transform)
            if (duration > 0 && typeof properties === 'object') {
                cssValues[transitionProperty] = cssProperties.join(', ')
                cssValues[transitionDuration] = duration + 's'
                cssValues[transitionTiming] = (ease || 'linear')
            }
        }

        wrappedCallback = function (event) {
            if (typeof event !== 'undefined') {
                if (event.target !== event.currentTarget) return // makes sure the event didn't bubble from "below"
                $(event.target).unbind(endEvent, wrappedCallback)
            }
            $(this).css(cssReset)
            callback && callback.call(this)
        }
        if (duration > 0) this.bind(endEvent, wrappedCallback)

        // trigger page reflow so new elements can animate
        this.size() && this.get(0).clientLeft

        this.css(cssValues)

        if (duration <= 0) setTimeout(function () {
            that.each(function () { wrappedCallback.call(this) })
        }, 0)

        return this
    }

    testEl = null
})(Zepto)
</script>
<script src="<?php echo TPL_URL;?>css/lottery_jiugong/js/jquery.min.js" type="text/javascript"></script> 
<script src="<?php echo TPL_URL;?>css/lottery_jiugong/js/alert.js" type="text/javascript"></script>
<script src="<?php echo TPL_URL;?>js/rem.js" type="text/javascript"></script>
<script type="text/javascript">
 function loading(canvas, options) {
            this.canvas = canvas;
            if (options) {
                this.radius = options.radius || 12;
                this.circleLineWidth = options.circleLineWidth || 4;
                this.circleColor = options.circleColor || 'lightgray';
                this.moveArcColor = options.moveArcColor || 'gray';
            } else {
                this.radius = 12;
                this.circelLineWidth = 4;
                this.circleColor = 'lightgray';
                this.moveArcColor = 'gray';
            }
        }
        loading.prototype = {
            show: function () {
                var canvas = this.canvas;
                if (!canvas.getContext) return;
                if (canvas.__loading) return;
                canvas.__loading = this;
                var ctx = canvas.getContext('2d');
                var radius = this.radius;
                var me = this;
                var rotatorAngle = Math.PI * 1.5;
                var step = Math.PI / 6;
                canvas.loadingInterval = setInterval(function () {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    var lineWidth = me.circleLineWidth;
                    var center = { x: canvas.width / 2, y: canvas.height / 2 };

                    ctx.beginPath();
                    ctx.lineWidth = lineWidth;
                    ctx.strokeStyle = me.circleColor;
                    ctx.arc(center.x, center.y + 20, radius, 0, Math.PI * 2);
                    ctx.closePath();
                    ctx.stroke();
                    //在圆圈上面画小圆   
                    ctx.beginPath();
                    ctx.strokeStyle = me.moveArcColor;
                    ctx.arc(center.x, center.y + 20, radius, rotatorAngle, rotatorAngle + Math.PI * .45);
                    ctx.stroke();
                    rotatorAngle += step;

                }, 100);
            },
            hide: function () {
                var canvas = this.canvas;
                canvas.__loading = false;
                if (canvas.loadingInterval) {
                    window.clearInterval(canvas.loadingInterval);
                }
                var ctx = canvas.getContext('2d');
                if (ctx) ctx.clearRect(0, 0, canvas.width, canvas.height);
            }
        };
</script>
<script src="<?php echo TPL_URL;?>css/guajiang/js/wScratchPad.js" type="text/javascript"></script>
</head>

<?php if ($lottery['need_subscribe'] && empty($is_subscribe)) {?>
<aside>
    <div class="layer"></div>
    <div class="layer_content">
        <div class="layer_title" style="text-shadow: initial;">亲，店家发现你还未关注店家的公众号</div>
        <div class="layer_text">
            <p>第一步：长按二维码并识别</p>
            <img src="<?php echo $_result['ticket'];?>" >
            <p>第二步：打开图文进入游戏</p>
            <p><em>贴心小提示：成为店铺会员购物一直有特权哦！</em></p>
        </div>
    </div>
</aside>
<?php }?>

<?php if($lottery['backgroundThumImage'] == ''){?>
<body data-role="page" class="activity-scratch-card-winning">
<?php }else{?>
	<?php if($lottery['fill_type'] == 0){?>
	<body style="background:url('<?php echo getAttachmentUrl($lottery['backgroundThumImage'])?>')">
	<?php }else{?>
	<body>
	<img src="<?php echo getAttachmentUrl($lottery['backgroundThumImage'])?>" style="position: fixed;top:0;left:0;width:100%;height:100%;z-index:-1">
	<?php }?>
<?php }?>

<?php if($lottery['endtime']<time()){?>
	<div class="main">
		<div class="banner"><img src="<?php echo TPL_URL;?>css/guajiang/images/activity-scratch-card-end2.jpg"></div>
		<div class="content" style="margin-top:-5px">
			<div class="boxcontent boxwhite">
				<div class="box">
					<div class="title-brown">活动结束说明：</div>
					<div class="Detail">
						<p><?php echo $lottery['endtitle']?></p>
					</div>
				</div>
			</div>
			<div id="zjl2" style="display:none" class="boxcontent boxwhite zjl">
				<div class="box">
					<div class="title-red"><span>填写中奖信息</span></div>
					<div class="Detail">
						<p>您中了：<span class="red prizetype">{pigcms:$Guajiang.winprize}</span></p>
						<input type="hidden" id="rid">
						<p><?php echo $lottery['win_info']?></p>
						<p><input type="password" class="px" id="parsswords" placeholder="商家输入兑奖密码"></p>
						<p><input class="pxbtn" name="提 交" id="save-btnn" value="商家提交" type="button"></p>
					</div>
				</div>
			</div>
		
			
			<?php if($record){?>
			<div class="boxcontent boxwhite" >
				<div class="box">
					<div class="title-orange"><span>您中过的奖</span></div>
					<?php foreach($record as $k=>$v){?>
					<div class="Detail" <?php if($k != 0){?>style="border-top :1px dashed rgba(0, 0, 0, 0.3);"<?php }?> 
					<?php if($v['phone'] == ''){?>
					onclick="lq('<?php echo $v['prize'];?>','<?php echo $v['sn'];?>','<?php echo $v['id'];?>')"
					<?php }elseif($v['sendstutas'] == 0){?>
					onclick="dh('<?php echo $v['prize'];?>','<?php echo $v['sn'];?>','<?php echo $v['id'];?>')"
					<?php }?>
					>
						<p>你中了：<span class="red" >{pigcms:$v.prize}等奖</span></p>
						<p>兑奖{pigcms:$Guajiang.renamesn}：<span class="red">{pigcms:$v.sn}</span></p>
						<p>中奖时间：<span class="red">{pigcms:$v.time|date="Y-m-d H:i:s",###}</span></p>
						<p>状态：<span class="red">
						<?php if($v['phone'] == ''){?>
						个人信息未填写，点击填写
						<?php }elseif($v['sendstutas'] == 0){?>
						未兑奖，点击兑奖
						<?php }else{?>
						已于{pigcms:$v.sendtime|date="Y-m-d H:i:s",###}兑奖
						<?php }?>
						</span></p>
					</div>
					<?php }?>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
<?php }else{?>
<div class="main">

<div class="cover">
	<img src="<?php echo TPL_URL;?>css/guajiang/images/activity-scratch-card-bannerbg.png">
	<div id="prize"></div>
	<div id="scratchpad"></div>
</div>

	<div class="content">
		<div id="zjl" style="display:none" class="boxcontent boxwhite zjl">
			<div class="box">
				<div class="title-red"><span>兑奖</span></div>
				<div class="Detail">
					<p>您中了：<span class="red prizetype prize_type"></span></p>
					<p><input class="pxbtn" id="save-btn" type="button" value="兑奖"></p>
				</div>
			</div>
		</div>
		<div id="zjl2" style="display:none" class="boxcontent boxwhite zjl">
			<div class="box">
				<div class="title-red"><span>填写中奖信息</span></div>
				<div class="Detail">
					<p>您中了：<span class="red prizetype"></span></p>
					<p><input type="password" class="px" id="passwords" value="" placeholder="商家输入兑奖密码"></p>
					<p><input class="pxbtn" name="提 交" id="save-btnn" value="商家提交" type="button"></p>
				</div>
			</div>
		</div>
	<?php 
		// 今天抽奖次数
		$today_draw_count = 0;
		// 今天中奖次数
		$today_prize_count = 0;
	?>
	<?php if($record){?>
	<div class="boxcontent boxwhite" >
		<div class="box">
			<div class="title-orange"><span>您中过的奖</span></div>
			<?php foreach($record as $k=>$v){
			if($v['dateline']>strtotime(date('Y-m-d 00:00:00'))){
					$today_draw_count++;
					if($v['prize_id']>0){
						$today_prize_count++;
					}
				}
			if($v['prize_id']>0){
				?>
			<div class="Detail" <?php if($k != 0){?>style="border-top :1px dashed rgba(0, 0, 0, 0.3);"<?php }?> 
			<?php if($v['status']==0){?>
				<?php if($v['isonline']==0){?>
					onclick="dh_unline('<?php echo $v['id'];?>','<?php echo $prize_names[$v['prize_id']];?>')"
				<?php }else{?>
					onclick="dh('<?php echo $v['id'];?>','<?php echo $prize_names[$v['prize_id']];?>')"
				<?php }?>
			<?php }?>
			>
				<p>你中了：<span class="red" ><?php echo $prize_names[$v['prize_id']]?></span></p>
				<p>中奖时间：<span class="red"><?php echo date('Y-m-d H:i:s',$v['dateline']);?></span></p>
				<p>状态：<span class="red">
				<?php if($v['status'] == 0){?>
				未兑奖，点击兑奖
				<?php }else{?>
				已于<?php echo date('Y-m-d H:i:s',$v['prize_time'])?>兑奖
				<?php }?>
				</span></p>
			</div>
			<?php }?>
			<?php }?>
		</div>
	</div>
	<?php }?>
	
	<div class="boxcontent boxwhite">
		<div class="box">
			<div class="title-brown"><span>奖项说明：</span></div>
			<div class="Detail">
			<?php if($lottery['win_limit'] == 1){?>
		 	<p>每人每日最多允许抽奖次数：<?php echo $lottery['win_limit_extend']?>-已抽取<span class="red" id="usenums"><?php echo $today_draw_count;?></span>次</p>
			<p>分享获取奖励次数：<?php echo $lottery_share_setting['num']-$lottery['win_limit_extend'];?>次</p>
			<?php }elseif($lottery['win_limit'] == 2){?>
			<p>每分享<?php echo $lottery['win_limit_extend']?>次，增加一次机会</p>
			<?php }elseif($lottery['win_limit'] == 3){?>
			<p>每抽奖一次，消耗<?php echo $lottery['win_limit_extend']?>积分</p>
			<?php }?>
			<br />
			<?php if($lottery['win_type']==0){?>
			<p>每人中奖总数：<?php echo $lottery['win_type_extend']?>次-已中奖<span class="red" id="winnums"><?php echo $win_num_record?></span>次</p>
			<?php }elseif($lottery['win_type']==1){?>
			<p>每人每日中奖总数：<?php echo $lottery['win_type_extend']?>次-已中奖<span class="red" id="winnums"><?php echo $today_prize_count;?></span>次</p>
			<?php }?>
			</div>
		</div>
	</div>
	<div class="boxcontent boxwhite">
		<div class="box">
			<div class="title-brown">活动说明：</div>
			<div class="Detail">
			<div class="text"><?php if ($lottery['starttime']>time()){echo '<p style="color:#000">活动还没有开始 :(</p>';}?><?php echo $lottery['active_desc']?></div>
			<p>活动时间:<?php echo date('Y-m-d H:i',$lottery['starttime'])?>至<?php echo date('Y-m-d H:i',$lottery['endtime'])?></p>
			</div>
		</div>
	</div>
</div>
<div style="clear:both;"></div>
</div>	
<?php }?>	
<div style="height:60px;"></div>
<style type="text/css">
#txt {
	color: #000000;
}
.footFix{width:100%;text-align:center;position:fixed;left:0;bottom:0;z-index:99;}
#footReturn a, #footReturn2 a {
display: block;
line-height: 41px;
color: #fff;
text-shadow: 1px 1px #282828;
font-size: 14px;
font-weight: bold;
}
#footReturn, #footReturn2 {
z-index: 89;
display: inline-block;
text-align: center;
text-decoration: none;
vertical-align: middle;
cursor: pointer;
width: 100%;
outline: 0 none;
overflow: visible;
Unknown property name.-moz-box-sizing: border-box;
box-sizing: border-box;
padding: 0;
height: 41px;
opacity: .95;
border-top: 1px solid #181818;
box-shadow: inset 0 1px 2px #b6b6b6;
background-color: #515151;
Invalid property value.background-image: -ms-linear-gradient(top,#838383,#202020);
background-image: -webkit-linear-gradient(top,#838383,#202020);
Invalid property value.background-image: -moz-linear-gradient(top,#838383,#202020);
Invalid property value.background-image: -o-linear-gradient(top,#838383,#202020);
background-image: -webkit-gradient(linear,0% 0,0% 100%,from(#838383),to(#202020));
Invalid property value.filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#838383',endColorstr='#202020');
Unknown property name.-ms-filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#838383',endColorstr='#202020');
}

</style>

<style type="text/css">
.window {
	width:290px;
	position:absolute;
	display:none;
	bottom:30px;
	left:50%;
	 z-index:9999;
	margin:-50px auto 0 -145px;
	padding:2px;
	border-radius:0.6em;
	-webkit-border-radius:0.6em;
	-moz-border-radius:0.6em;
	background-color: #ffffff;
	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	-o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	font:14px/1.5 Microsoft YaHei,Helvitica,Verdana,Arial,san-serif;
}
.window .title {
	
	background-color: #A3A2A1;
	line-height: 26px;
    padding: 5px 5px 5px 10px;
	color:#ffffff;
	font-size:16px;
	border-radius:0.5em 0.5em 0 0;
	-webkit-border-radius:0.5em 0.5em 0 0;
	-moz-border-radius:0.5em 0.5em 0 0;
	background-image: -webkit-gradient(linear, left top, left bottom, from( #585858 ), to( #565656 )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient(#585858, #565656); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient(#585858, #565656); /* FF3.6 */
	background-image:     -ms-linear-gradient(#585858, #565656); /* IE10 */
	background-image:      -o-linear-gradient(#585858, #565656); /* Opera 11.10+ */
	background-image:         linear-gradient(#585858, #565656);
	
}
.window .content {
	/*min-height:100px;*/
	overflow:auto;
	padding:10px;
	background: linear-gradient(#FBFBFB, #EEEEEE) repeat scroll 0 0 #FFF9DF;
    color: #222222;
    text-shadow: 0 1px 0 #FFFFFF;
	border-radius: 0 0 0.6em 0.6em;
	-webkit-border-radius: 0 0 0.6em 0.6em;
	-moz-border-radius: 0 0 0.6em 0.6em;
}
.window #txt {
	min-height:30px;font-size:16px; line-height:22px;
}
.window .txtbtn {
	
	background: #f1f1f1;
	background-image: -webkit-gradient(linear, left top, left bottom, from( #DCDCDC ), to( #f1f1f1 )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ffffff , #DCDCDC ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ffffff , #DCDCDC ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ffffff , #DCDCDC ); /* IE10 */
	background-image:      -o-linear-gradient( #ffffff , #DCDCDC ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ffffff , #DCDCDC );
	border: 1px solid #CCCCCC;
	border-bottom: 1px solid #B4B4B4;
	color: #555555;
	font-weight: bold;
	text-shadow: 0 1px 0 #FFFFFF;
	border-radius: 0.6em 0.6em 0.6em 0.6em;
	display: block;
	width: 100%;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
	text-overflow: ellipsis;
	white-space: nowrap;
	cursor: pointer;
	text-align: windowcenter;
	font-weight: bold;
	font-size: 18px;
	padding:6px;
	margin:10px 0 0 0;
}
.window .txtbtn:visited {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #ffffff ), to( #cccccc )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ffffff , #cccccc ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ffffff , #cccccc ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ffffff , #cccccc ); /* IE10 */
	background-image:      -o-linear-gradient( #ffffff , #cccccc ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ffffff , #cccccc );
}
.window .txtbtn:hover {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #ffffff ), to( #cccccc )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ffffff , #cccccc ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ffffff , #cccccc ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ffffff , #cccccc ); /* IE10 */
	background-image:      -o-linear-gradient( #ffffff , #cccccc ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ffffff , #cccccc );
}
.window .txtbtn:active {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #cccccc ), to( #ffffff )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #cccccc , #ffffff ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #cccccc , #ffffff ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #cccccc , #ffffff ); /* IE10 */
	background-image:      -o-linear-gradient( #cccccc , #ffffff ); /* Opera 11.10+ */
	background-image:         linear-gradient( #cccccc , #ffffff );
	border: 1px solid #C9C9C9;
	border-top: 1px solid #B4B4B4;
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3) inset;
}

.window .title .close {
	float:right;
	background-image: url();
	width:26px;
	height:26px;
	display:block;	
}
</style>
<input type="hidden" id="rid" />
<input type="hidden" id="isonline" value="0" />
<div class="window" id="windowcenter">
	<div id="title" class="title">消息提醒<span class="close" id="alertclose"></span></div>
	<div class="content">
	 <div id="txt"></div>
	 <input type="button" value="确定" id="windowclosebutton" name="确定" class="txtbtn">	
	</div>
</div>
 

<script type="text/javascript">
        var num = 1;
        var goon = true;
		var istoget=false;
var prize_arr = ['一等奖','二等奖','三等奖','四等奖','五等奖','六等奖'];
$(function () {
		var useragent = window.navigator.userAgent.toLowerCase();
            $("#scratchpad").wScratchPad({
                width: 150,
                height: 40,
                color: "#a9a9a7",
                scratchMove: function (e,percent) {
					if(num == 1  && !istoget){
					istoget=true;
						$.ajax({
							url : '/wap/lottery.php?action=get_prize&aid=<?php echo $lottery['id']?>',
							type : "get",
							dataType : "json",
							data : {aid:<?php echo $lottery['id']?>},
							success : function(data){
								if(data.err_code == 1){
									zjl = 0;
									alert(data.err_msg);
								}else{
									// 抽奖次数
									var usenums = $('#usenums').text();
									$('#usenums').text(parseInt(usenums)+1);
									
									if(data.success==false){
										$('#prize').text('谢谢参与');
										alert('谢谢参与');
										setTimeout(function(){window.location.href = '/wap/lottery.php?action=detail&id=<?php echo $lottery['id']?>&rand='+Math.random();},2000);
										return;
									}
									// 中奖次数
									var winnums = $('#winnums').text();
					    			$('#winnums').text(parseInt(winnums)+1);
									zjl = 1;
									$('.prize_type').text(prize_arr[data.prizetype-1]);
									$('#prize').text(prize_arr[data.prizetype-1]);
									$('#rid').val(data.rid);
									if(data.isonline != undefined){
										$('#isonline').val(data.isonline);
									}
									$('#zjl').show('slow');
								}
							}
						});
					}
                    if (zjl>0 && num > 5 && goon) {
                        //$("#zjl").fadeIn();
                        goon = false; 
                        $("#zjl").slideToggle(500);
                        //$("#outercont").slideUp(500)
                    }
					if (useragent.indexOf("android 4") > 0) {
                        if ($("#scratchpad").css("color").indexOf("51") > 0) {
                            $("#scratchpad").css("color", "rgb(50,50,50)");
                        } else if ($("#scratchpad").css("color").indexOf("50") > 0) {
                            $("#scratchpad").css("color", "rgb(51,51,51)");
                        }
                    }

                }
            });
        });
        
$("#save-btn").bind("click",
	function() {
	    var aid = <?php echo $lottery['id']?>;	// 活动id
	    var rid = $('#rid').val();
		var isonline = $('#isonline').val();
		if(isonline == 0){
			dh_unline(rid,$(".prizetype").text());
			return;
		}
	    // 检查中奖商品是否需要发货，如果需要发货，检查用户是否有收货地址
	    $.get('/wap/lottery.php?action=check_address',{'aid':aid},function(response){
			if(response.err_code>0){
				alert(response.err_msg);
				setTimeout(function(){window.location = '/wap/lottery.php?action=myaddress&aid='+aid},2000);
			}else{
				// 开始兑奖
				$.post('/wap/lottery.php?action=cash_prize',{'rid':rid,'aid':aid},function(response){
					alert(response.err_msg);
					if(response.err_code==0){
						$("#zjl").hide("slow");
						setTimeout(function(){window.location.href = '/wap/lottery.php?action=detail&id=<?php echo $lottery['id']?>&rand='+Math.random();},2000);	
					}
				},'json');
			}
	    },'json');
});



$("#save-btnn").bind("click",
function () {
    var aid = <?php echo $lottery['id']?>;	// 活动id
    var rid = $('#rid').val();
    // 检查中奖商品是否需要发货，如果需要发货，检查用户是否有收货地址
    $.get('/wap/lottery.php?action=check_address',{'aid':aid},function(response){
		if(response.err_code>0){
			alert(response.err_msg);
			setTimeout(function(){window.location = '/wap/lottery.php?action=myaddress&aid='+aid},2000);
		}else{
			// 开始兑奖
			var password = $('#passwords').val();
			$.post('/wap/lottery.php?action=cash_prize',{'rid':rid,'aid':aid,'password':password},function(response){
				alert(response.err_msg);
				if(response.err_code==0){
					setTimeout(function(){window.location.href = '/wap/lottery.php?action=detail&id=<?php echo $lottery['id']?>&rand='+Math.random();},2000);	
				}
			},'json');
		}
    },'json');
});

function lq(prizetype,sncode,rid){
	$('.zjl').slideUp(500);
	$('#zjl').slideDown(500);
	$('.prizetype').text(prizetype+'等奖');
	$('.sncode').text(sncode);
	$('#rid').val(rid);
}
/*
function dh(prizetype,sncode,rid){
	$('.zjl').slideUp(500);
	$('#zjl2').slideDown(500);
	$('.prizetype').text(prizetype+'等奖');
	$('.sncode').text(sncode);
	$('#rid').val(rid);
}
*/

function dh_unline(rid,prizetype){
	$('.zjl').slideUp(500);
	$('#zjl2').slideDown(500);
	$('.prizetype').text(prizetype);
	$('#rid').val(rid);
}
function dh(rid,prizetype){
	// 开始兑奖
	$.post('/wap/lottery.php?action=cash_prize',{'rid':rid},function(response){
		if(response.err_code==0){
			alert(response.err_msg);
			setTimeout(function(){window.location.href = '/wap/lottery.php?action=detail&id=<?php echo $lottery['id']?>&rand='+Math.random();},1500);
			return;
		}
		if(response.err_code==1){	// 线下兑奖，需要商家填写兑奖密码
			$('.result').slideUp(500);
			$('#result2').slideDown(500);
			$('.prizetype').text(prizetype);
			$('#rid').val(rid);
			return;
		}
		// 错误提示
		if(response.err_code>1000){
			alert(response.err_msg);
		}
	},'json');
}

</script>
<?php echo $shareData;?>
</body></html>