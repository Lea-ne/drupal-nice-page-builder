(function () {
  'use strict';

  /**
   * @license
   * Copyright 2019 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   */
  const t$1=window,e$5=t$1.ShadowRoot&&(void 0===t$1.ShadyCSS||t$1.ShadyCSS.nativeShadow)&&"adoptedStyleSheets"in Document.prototype&&"replace"in CSSStyleSheet.prototype,s$3=Symbol(),n$4=new WeakMap;class o$4{constructor(t,e,n){if(this._$cssResult$=!0,n!==s$3)throw Error("CSSResult is not constructable. Use `unsafeCSS` or `css` instead.");this.cssText=t,this.t=e;}get styleSheet(){let t=this.o;const s=this.t;if(e$5&&void 0===t){const e=void 0!==s&&1===s.length;e&&(t=n$4.get(s)),void 0===t&&((this.o=t=new CSSStyleSheet).replaceSync(this.cssText),e&&n$4.set(s,t));}return t}toString(){return this.cssText}}const r$2=t=>new o$4("string"==typeof t?t:t+"",void 0,s$3),i$2=(t,...e)=>{const n=1===t.length?t[0]:e.reduce(((e,s,n)=>e+(t=>{if(!0===t._$cssResult$)return t.cssText;if("number"==typeof t)return t;throw Error("Value passed to 'css' function must be a 'css' function result: "+t+". Use 'unsafeCSS' to pass non-literal values, but take care to ensure page security.")})(s)+t[n+1]),t[0]);return new o$4(n,t,s$3)},S$1=(s,n)=>{e$5?s.adoptedStyleSheets=n.map((t=>t instanceof CSSStyleSheet?t:t.styleSheet)):n.forEach((e=>{const n=document.createElement("style"),o=t$1.litNonce;void 0!==o&&n.setAttribute("nonce",o),n.textContent=e.cssText,s.appendChild(n);}));},c$1=e$5?t=>t:t=>t instanceof CSSStyleSheet?(t=>{let e="";for(const s of t.cssRules)e+=s.cssText;return r$2(e)})(t):t;

  /**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   */var s$2;const e$4=window,r$1=e$4.trustedTypes,h$1=r$1?r$1.emptyScript:"",o$3=e$4.reactiveElementPolyfillSupport,n$3={toAttribute(t,i){switch(i){case Boolean:t=t?h$1:null;break;case Object:case Array:t=null==t?t:JSON.stringify(t);}return t},fromAttribute(t,i){let s=t;switch(i){case Boolean:s=null!==t;break;case Number:s=null===t?null:Number(t);break;case Object:case Array:try{s=JSON.parse(t);}catch(t){s=null;}}return s}},a$1=(t,i)=>i!==t&&(i==i||t==t),l$2={attribute:!0,type:String,converter:n$3,reflect:!1,hasChanged:a$1};class d$1 extends HTMLElement{constructor(){super(),this._$Ei=new Map,this.isUpdatePending=!1,this.hasUpdated=!1,this._$El=null,this.u();}static addInitializer(t){var i;this.finalize(),(null!==(i=this.h)&&void 0!==i?i:this.h=[]).push(t);}static get observedAttributes(){this.finalize();const t=[];return this.elementProperties.forEach(((i,s)=>{const e=this._$Ep(s,i);void 0!==e&&(this._$Ev.set(e,s),t.push(e));})),t}static createProperty(t,i=l$2){if(i.state&&(i.attribute=!1),this.finalize(),this.elementProperties.set(t,i),!i.noAccessor&&!this.prototype.hasOwnProperty(t)){const s="symbol"==typeof t?Symbol():"__"+t,e=this.getPropertyDescriptor(t,s,i);void 0!==e&&Object.defineProperty(this.prototype,t,e);}}static getPropertyDescriptor(t,i,s){return {get(){return this[i]},set(e){const r=this[t];this[i]=e,this.requestUpdate(t,r,s);},configurable:!0,enumerable:!0}}static getPropertyOptions(t){return this.elementProperties.get(t)||l$2}static finalize(){if(this.hasOwnProperty("finalized"))return !1;this.finalized=!0;const t=Object.getPrototypeOf(this);if(t.finalize(),void 0!==t.h&&(this.h=[...t.h]),this.elementProperties=new Map(t.elementProperties),this._$Ev=new Map,this.hasOwnProperty("properties")){const t=this.properties,i=[...Object.getOwnPropertyNames(t),...Object.getOwnPropertySymbols(t)];for(const s of i)this.createProperty(s,t[s]);}return this.elementStyles=this.finalizeStyles(this.styles),!0}static finalizeStyles(i){const s=[];if(Array.isArray(i)){const e=new Set(i.flat(1/0).reverse());for(const i of e)s.unshift(c$1(i));}else void 0!==i&&s.push(c$1(i));return s}static _$Ep(t,i){const s=i.attribute;return !1===s?void 0:"string"==typeof s?s:"string"==typeof t?t.toLowerCase():void 0}u(){var t;this._$E_=new Promise((t=>this.enableUpdating=t)),this._$AL=new Map,this._$Eg(),this.requestUpdate(),null===(t=this.constructor.h)||void 0===t||t.forEach((t=>t(this)));}addController(t){var i,s;(null!==(i=this._$ES)&&void 0!==i?i:this._$ES=[]).push(t),void 0!==this.renderRoot&&this.isConnected&&(null===(s=t.hostConnected)||void 0===s||s.call(t));}removeController(t){var i;null===(i=this._$ES)||void 0===i||i.splice(this._$ES.indexOf(t)>>>0,1);}_$Eg(){this.constructor.elementProperties.forEach(((t,i)=>{this.hasOwnProperty(i)&&(this._$Ei.set(i,this[i]),delete this[i]);}));}createRenderRoot(){var t;const s=null!==(t=this.shadowRoot)&&void 0!==t?t:this.attachShadow(this.constructor.shadowRootOptions);return S$1(s,this.constructor.elementStyles),s}connectedCallback(){var t;void 0===this.renderRoot&&(this.renderRoot=this.createRenderRoot()),this.enableUpdating(!0),null===(t=this._$ES)||void 0===t||t.forEach((t=>{var i;return null===(i=t.hostConnected)||void 0===i?void 0:i.call(t)}));}enableUpdating(t){}disconnectedCallback(){var t;null===(t=this._$ES)||void 0===t||t.forEach((t=>{var i;return null===(i=t.hostDisconnected)||void 0===i?void 0:i.call(t)}));}attributeChangedCallback(t,i,s){this._$AK(t,s);}_$EO(t,i,s=l$2){var e;const r=this.constructor._$Ep(t,s);if(void 0!==r&&!0===s.reflect){const h=(void 0!==(null===(e=s.converter)||void 0===e?void 0:e.toAttribute)?s.converter:n$3).toAttribute(i,s.type);this._$El=t,null==h?this.removeAttribute(r):this.setAttribute(r,h),this._$El=null;}}_$AK(t,i){var s;const e=this.constructor,r=e._$Ev.get(t);if(void 0!==r&&this._$El!==r){const t=e.getPropertyOptions(r),h="function"==typeof t.converter?{fromAttribute:t.converter}:void 0!==(null===(s=t.converter)||void 0===s?void 0:s.fromAttribute)?t.converter:n$3;this._$El=r,this[r]=h.fromAttribute(i,t.type),this._$El=null;}}requestUpdate(t,i,s){let e=!0;void 0!==t&&(((s=s||this.constructor.getPropertyOptions(t)).hasChanged||a$1)(this[t],i)?(this._$AL.has(t)||this._$AL.set(t,i),!0===s.reflect&&this._$El!==t&&(void 0===this._$EC&&(this._$EC=new Map),this._$EC.set(t,s))):e=!1),!this.isUpdatePending&&e&&(this._$E_=this._$Ej());}async _$Ej(){this.isUpdatePending=!0;try{await this._$E_;}catch(t){Promise.reject(t);}const t=this.scheduleUpdate();return null!=t&&await t,!this.isUpdatePending}scheduleUpdate(){return this.performUpdate()}performUpdate(){var t;if(!this.isUpdatePending)return;this.hasUpdated,this._$Ei&&(this._$Ei.forEach(((t,i)=>this[i]=t)),this._$Ei=void 0);let i=!1;const s=this._$AL;try{i=this.shouldUpdate(s),i?(this.willUpdate(s),null===(t=this._$ES)||void 0===t||t.forEach((t=>{var i;return null===(i=t.hostUpdate)||void 0===i?void 0:i.call(t)})),this.update(s)):this._$Ek();}catch(t){throw i=!1,this._$Ek(),t}i&&this._$AE(s);}willUpdate(t){}_$AE(t){var i;null===(i=this._$ES)||void 0===i||i.forEach((t=>{var i;return null===(i=t.hostUpdated)||void 0===i?void 0:i.call(t)})),this.hasUpdated||(this.hasUpdated=!0,this.firstUpdated(t)),this.updated(t);}_$Ek(){this._$AL=new Map,this.isUpdatePending=!1;}get updateComplete(){return this.getUpdateComplete()}getUpdateComplete(){return this._$E_}shouldUpdate(t){return !0}update(t){void 0!==this._$EC&&(this._$EC.forEach(((t,i)=>this._$EO(i,this[i],t))),this._$EC=void 0),this._$Ek();}updated(t){}firstUpdated(t){}}d$1.finalized=!0,d$1.elementProperties=new Map,d$1.elementStyles=[],d$1.shadowRootOptions={mode:"open"},null==o$3||o$3({ReactiveElement:d$1}),(null!==(s$2=e$4.reactiveElementVersions)&&void 0!==s$2?s$2:e$4.reactiveElementVersions=[]).push("1.6.1");

  /**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   */
  var t;const i$1=window,s$1=i$1.trustedTypes,e$3=s$1?s$1.createPolicy("lit-html",{createHTML:t=>t}):void 0,o$2=`lit$${(Math.random()+"").slice(9)}$`,n$2="?"+o$2,l$1=`<${n$2}>`,h=document,r=(t="")=>h.createComment(t),d=t=>null===t||"object"!=typeof t&&"function"!=typeof t,u=Array.isArray,c=t=>u(t)||"function"==typeof(null==t?void 0:t[Symbol.iterator]),v=/<(?:(!--|\/[^a-zA-Z])|(\/?[a-zA-Z][^>\s]*)|(\/?$))/g,a=/-->/g,f=/>/g,_=RegExp(">|[ \t\n\f\r](?:([^\\s\"'>=/]+)([ \t\n\f\r]*=[ \t\n\f\r]*(?:[^ \t\n\f\r\"'`<>=]|(\"|')|))|$)","g"),m=/'/g,p=/"/g,$=/^(?:script|style|textarea|title)$/i,g=t=>(i,...s)=>({_$litType$:t,strings:i,values:s}),y=g(1),x=Symbol.for("lit-noChange"),b=Symbol.for("lit-nothing"),T=new WeakMap,A=h.createTreeWalker(h,129,null,!1),E=(t,i)=>{const s=t.length-1,n=[];let h,r=2===i?"<svg>":"",d=v;for(let i=0;i<s;i++){const s=t[i];let e,u,c=-1,g=0;for(;g<s.length&&(d.lastIndex=g,u=d.exec(s),null!==u);)g=d.lastIndex,d===v?"!--"===u[1]?d=a:void 0!==u[1]?d=f:void 0!==u[2]?($.test(u[2])&&(h=RegExp("</"+u[2],"g")),d=_):void 0!==u[3]&&(d=_):d===_?">"===u[0]?(d=null!=h?h:v,c=-1):void 0===u[1]?c=-2:(c=d.lastIndex-u[2].length,e=u[1],d=void 0===u[3]?_:'"'===u[3]?p:m):d===p||d===m?d=_:d===a||d===f?d=v:(d=_,h=void 0);const y=d===_&&t[i+1].startsWith("/>")?" ":"";r+=d===v?s+l$1:c>=0?(n.push(e),s.slice(0,c)+"$lit$"+s.slice(c)+o$2+y):s+o$2+(-2===c?(n.push(void 0),i):y);}const u=r+(t[s]||"<?>")+(2===i?"</svg>":"");if(!Array.isArray(t)||!t.hasOwnProperty("raw"))throw Error("invalid template strings array");return [void 0!==e$3?e$3.createHTML(u):u,n]};class C{constructor({strings:t,_$litType$:i},e){let l;this.parts=[];let h=0,d=0;const u=t.length-1,c=this.parts,[v,a]=E(t,i);if(this.el=C.createElement(v,e),A.currentNode=this.el.content,2===i){const t=this.el.content,i=t.firstChild;i.remove(),t.append(...i.childNodes);}for(;null!==(l=A.nextNode())&&c.length<u;){if(1===l.nodeType){if(l.hasAttributes()){const t=[];for(const i of l.getAttributeNames())if(i.endsWith("$lit$")||i.startsWith(o$2)){const s=a[d++];if(t.push(i),void 0!==s){const t=l.getAttribute(s.toLowerCase()+"$lit$").split(o$2),i=/([.?@])?(.*)/.exec(s);c.push({type:1,index:h,name:i[2],strings:t,ctor:"."===i[1]?M:"?"===i[1]?k:"@"===i[1]?H:S});}else c.push({type:6,index:h});}for(const i of t)l.removeAttribute(i);}if($.test(l.tagName)){const t=l.textContent.split(o$2),i=t.length-1;if(i>0){l.textContent=s$1?s$1.emptyScript:"";for(let s=0;s<i;s++)l.append(t[s],r()),A.nextNode(),c.push({type:2,index:++h});l.append(t[i],r());}}}else if(8===l.nodeType)if(l.data===n$2)c.push({type:2,index:h});else {let t=-1;for(;-1!==(t=l.data.indexOf(o$2,t+1));)c.push({type:7,index:h}),t+=o$2.length-1;}h++;}}static createElement(t,i){const s=h.createElement("template");return s.innerHTML=t,s}}function P(t,i,s=t,e){var o,n,l,h;if(i===x)return i;let r=void 0!==e?null===(o=s._$Co)||void 0===o?void 0:o[e]:s._$Cl;const u=d(i)?void 0:i._$litDirective$;return (null==r?void 0:r.constructor)!==u&&(null===(n=null==r?void 0:r._$AO)||void 0===n||n.call(r,!1),void 0===u?r=void 0:(r=new u(t),r._$AT(t,s,e)),void 0!==e?(null!==(l=(h=s)._$Co)&&void 0!==l?l:h._$Co=[])[e]=r:s._$Cl=r),void 0!==r&&(i=P(t,r._$AS(t,i.values),r,e)),i}class V{constructor(t,i){this.u=[],this._$AN=void 0,this._$AD=t,this._$AM=i;}get parentNode(){return this._$AM.parentNode}get _$AU(){return this._$AM._$AU}v(t){var i;const{el:{content:s},parts:e}=this._$AD,o=(null!==(i=null==t?void 0:t.creationScope)&&void 0!==i?i:h).importNode(s,!0);A.currentNode=o;let n=A.nextNode(),l=0,r=0,d=e[0];for(;void 0!==d;){if(l===d.index){let i;2===d.type?i=new N(n,n.nextSibling,this,t):1===d.type?i=new d.ctor(n,d.name,d.strings,this,t):6===d.type&&(i=new I(n,this,t)),this.u.push(i),d=e[++r];}l!==(null==d?void 0:d.index)&&(n=A.nextNode(),l++);}return o}p(t){let i=0;for(const s of this.u)void 0!==s&&(void 0!==s.strings?(s._$AI(t,s,i),i+=s.strings.length-2):s._$AI(t[i])),i++;}}class N{constructor(t,i,s,e){var o;this.type=2,this._$AH=b,this._$AN=void 0,this._$AA=t,this._$AB=i,this._$AM=s,this.options=e,this._$Cm=null===(o=null==e?void 0:e.isConnected)||void 0===o||o;}get _$AU(){var t,i;return null!==(i=null===(t=this._$AM)||void 0===t?void 0:t._$AU)&&void 0!==i?i:this._$Cm}get parentNode(){let t=this._$AA.parentNode;const i=this._$AM;return void 0!==i&&11===t.nodeType&&(t=i.parentNode),t}get startNode(){return this._$AA}get endNode(){return this._$AB}_$AI(t,i=this){t=P(this,t,i),d(t)?t===b||null==t||""===t?(this._$AH!==b&&this._$AR(),this._$AH=b):t!==this._$AH&&t!==x&&this.g(t):void 0!==t._$litType$?this.$(t):void 0!==t.nodeType?this.T(t):c(t)?this.k(t):this.g(t);}O(t,i=this._$AB){return this._$AA.parentNode.insertBefore(t,i)}T(t){this._$AH!==t&&(this._$AR(),this._$AH=this.O(t));}g(t){this._$AH!==b&&d(this._$AH)?this._$AA.nextSibling.data=t:this.T(h.createTextNode(t)),this._$AH=t;}$(t){var i;const{values:s,_$litType$:e}=t,o="number"==typeof e?this._$AC(t):(void 0===e.el&&(e.el=C.createElement(e.h,this.options)),e);if((null===(i=this._$AH)||void 0===i?void 0:i._$AD)===o)this._$AH.p(s);else {const t=new V(o,this),i=t.v(this.options);t.p(s),this.T(i),this._$AH=t;}}_$AC(t){let i=T.get(t.strings);return void 0===i&&T.set(t.strings,i=new C(t)),i}k(t){u(this._$AH)||(this._$AH=[],this._$AR());const i=this._$AH;let s,e=0;for(const o of t)e===i.length?i.push(s=new N(this.O(r()),this.O(r()),this,this.options)):s=i[e],s._$AI(o),e++;e<i.length&&(this._$AR(s&&s._$AB.nextSibling,e),i.length=e);}_$AR(t=this._$AA.nextSibling,i){var s;for(null===(s=this._$AP)||void 0===s||s.call(this,!1,!0,i);t&&t!==this._$AB;){const i=t.nextSibling;t.remove(),t=i;}}setConnected(t){var i;void 0===this._$AM&&(this._$Cm=t,null===(i=this._$AP)||void 0===i||i.call(this,t));}}class S{constructor(t,i,s,e,o){this.type=1,this._$AH=b,this._$AN=void 0,this.element=t,this.name=i,this._$AM=e,this.options=o,s.length>2||""!==s[0]||""!==s[1]?(this._$AH=Array(s.length-1).fill(new String),this.strings=s):this._$AH=b;}get tagName(){return this.element.tagName}get _$AU(){return this._$AM._$AU}_$AI(t,i=this,s,e){const o=this.strings;let n=!1;if(void 0===o)t=P(this,t,i,0),n=!d(t)||t!==this._$AH&&t!==x,n&&(this._$AH=t);else {const e=t;let l,h;for(t=o[0],l=0;l<o.length-1;l++)h=P(this,e[s+l],i,l),h===x&&(h=this._$AH[l]),n||(n=!d(h)||h!==this._$AH[l]),h===b?t=b:t!==b&&(t+=(null!=h?h:"")+o[l+1]),this._$AH[l]=h;}n&&!e&&this.j(t);}j(t){t===b?this.element.removeAttribute(this.name):this.element.setAttribute(this.name,null!=t?t:"");}}class M extends S{constructor(){super(...arguments),this.type=3;}j(t){this.element[this.name]=t===b?void 0:t;}}const R=s$1?s$1.emptyScript:"";class k extends S{constructor(){super(...arguments),this.type=4;}j(t){t&&t!==b?this.element.setAttribute(this.name,R):this.element.removeAttribute(this.name);}}class H extends S{constructor(t,i,s,e,o){super(t,i,s,e,o),this.type=5;}_$AI(t,i=this){var s;if((t=null!==(s=P(this,t,i,0))&&void 0!==s?s:b)===x)return;const e=this._$AH,o=t===b&&e!==b||t.capture!==e.capture||t.once!==e.once||t.passive!==e.passive,n=t!==b&&(e===b||o);o&&this.element.removeEventListener(this.name,this,e),n&&this.element.addEventListener(this.name,this,t),this._$AH=t;}handleEvent(t){var i,s;"function"==typeof this._$AH?this._$AH.call(null!==(s=null===(i=this.options)||void 0===i?void 0:i.host)&&void 0!==s?s:this.element,t):this._$AH.handleEvent(t);}}class I{constructor(t,i,s){this.element=t,this.type=6,this._$AN=void 0,this._$AM=i,this.options=s;}get _$AU(){return this._$AM._$AU}_$AI(t){P(this,t);}}const z=i$1.litHtmlPolyfillSupport;null==z||z(C,N),(null!==(t=i$1.litHtmlVersions)&&void 0!==t?t:i$1.litHtmlVersions=[]).push("2.6.1");const Z=(t,i,s)=>{var e,o;const n=null!==(e=null==s?void 0:s.renderBefore)&&void 0!==e?e:i;let l=n._$litPart$;if(void 0===l){const t=null!==(o=null==s?void 0:s.renderBefore)&&void 0!==o?o:null;n._$litPart$=l=new N(i.insertBefore(r(),t),t,void 0,null!=s?s:{});}return l._$AI(t),l};

  /**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   */var l,o$1;class s extends d$1{constructor(){super(...arguments),this.renderOptions={host:this},this._$Do=void 0;}createRenderRoot(){var t,e;const i=super.createRenderRoot();return null!==(t=(e=this.renderOptions).renderBefore)&&void 0!==t||(e.renderBefore=i.firstChild),i}update(t){const i=this.render();this.hasUpdated||(this.renderOptions.isConnected=this.isConnected),super.update(t),this._$Do=Z(i,this.renderRoot,this.renderOptions);}connectedCallback(){var t;super.connectedCallback(),null===(t=this._$Do)||void 0===t||t.setConnected(!0);}disconnectedCallback(){var t;super.disconnectedCallback(),null===(t=this._$Do)||void 0===t||t.setConnected(!1);}render(){return x}}s.finalized=!0,s._$litElement$=!0,null===(l=globalThis.litElementHydrateSupport)||void 0===l||l.call(globalThis,{LitElement:s});const n$1=globalThis.litElementPolyfillSupport;null==n$1||n$1({LitElement:s});(null!==(o$1=globalThis.litElementVersions)&&void 0!==o$1?o$1:globalThis.litElementVersions=[]).push("3.2.2");

  /**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   */
  const e$2=e=>n=>"function"==typeof n?((e,n)=>(customElements.define(e,n),n))(e,n):((e,n)=>{const{kind:t,elements:s}=n;return {kind:t,elements:s,finisher(n){customElements.define(e,n);}}})(e,n);

  /**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   */
  const i=(i,e)=>"method"===e.kind&&e.descriptor&&!("value"in e.descriptor)?{...e,finisher(n){n.createProperty(e.key,i);}}:{kind:"field",key:Symbol(),placement:"own",descriptor:{},originalKey:e.key,initializer(){"function"==typeof e.initializer&&(this[e.key]=e.initializer.call(this));},finisher(n){n.createProperty(e.key,i);}};function e$1(e){return (n,t)=>void 0!==t?((i,e,n)=>{e.constructor.createProperty(n,i);})(e,n,t):i(e,n)}

  /**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   */
  const o=({finisher:e,descriptor:t})=>(o,n)=>{var r;if(void 0===n){const n=null!==(r=o.originalKey)&&void 0!==r?r:o.key,i=null!=t?{kind:"method",placement:"prototype",key:n,descriptor:t(o.key)}:{...o,key:n};return null!=e&&(i.finisher=function(t){e(t,n);}),i}{const r=o.constructor;void 0!==t&&Object.defineProperty(o,n,t(n)),null==e||e(r,n);}};

  /**
   * @license
   * Copyright 2017 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   */
  function e(e){return o({descriptor:r=>({async get(){var r;return await this.updateComplete,null===(r=this.renderRoot)||void 0===r?void 0:r.querySelector(e)},enumerable:!0,configurable:!0})})}

  /**
   * @license
   * Copyright 2021 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   */var n;null!=(null===(n=window.HTMLSlotElement)||void 0===n?void 0:n.prototype.assignedElements)?(o,n)=>o.assignedElements(n):(o,n)=>o.assignedNodes(n).filter((o=>o.nodeType===Node.ELEMENT_NODE));

  /**
   * @license
   * Copyright 2019 Google LLC
   * SPDX-License-Identifier: BSD-3-Clause
   */
  var __decorate = (window && window.__decorate) || function (decorators, target, key, desc) {
      var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
      if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
      else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
      return c > 3 && r && Object.defineProperty(target, key, r), r;
  };
  // enum DialogStatus {
  //   Closed = "closed",
  //   Open = "open",
  //   Modal = "modal",
  //   Dock = "dock",
  // }
  var DialogInteraction;
  (function (DialogInteraction) {
      DialogInteraction["Idle"] = "idle";
      DialogInteraction["Move"] = "move";
      DialogInteraction["Resize"] = "resize";
  })(DialogInteraction || (DialogInteraction = {}));
  var DockableDirection;
  (function (DockableDirection) {
      DockableDirection["None"] = "none";
      DockableDirection["Top"] = "top";
      DockableDirection["Right"] = "right";
      DockableDirection["Bottom"] = "bottom";
      DockableDirection["Left"] = "left";
  })(DockableDirection || (DockableDirection = {}));
  var ResizeDirection;
  (function (ResizeDirection) {
      ResizeDirection["None"] = "none";
      ResizeDirection["N"] = "n";
      ResizeDirection["NE"] = "ne";
      ResizeDirection["E"] = "e";
      ResizeDirection["SE"] = "se";
      ResizeDirection["S"] = "s";
      ResizeDirection["SW"] = "sw";
      ResizeDirection["W"] = "w";
      ResizeDirection["NW"] = "nw";
  })(ResizeDirection || (ResizeDirection = {}));
  /**
   * An example element.
   *
   * @fires count-changed - Indicates when the count changes
   * @slot - This element has a slot
   * @csspart button - The button
   */
  let MercuryDialog = class MercuryDialog extends s {
      constructor() {
          super(...arguments);
          /**
           * Whether the dialog should be open or not.
           */
          this.open = false;
          /**
           * Whether the dialog should be treated as a modal with a backdrop.
           */
          this.modal = false;
          /**
           * Whether the dialog should be moveable.
           */
          this.moveable = false;
          /**
           * Whether to render a move button.
           */
          this.moveBtn = false;
          /**
           * The location in which the dialog should be docked.
           */
          this.dock = 'none';
          /**
           * True if a docked dialog should push the page contents over
           * rather than overlaying.
           */
          this.push = false;
          /**
           * The location in which the dialog should be docked.
           */
          this.dockable = false;
          this.hideCloseButton = false;
          this.backdropOpacity = 1;
          this.returnValue = '';
          this.height = 400;
          this.width = 400;
          /**
           * Whether or not the dialog is resizable.
           */
          this.resizable = false;
          this._dialogInteraction = DialogInteraction.Idle;
          /**
           * The title shown in the dialog header when open.
           */
          this.title = '';
          this._dragStartX = 0;
          this._dragStartY = 0;
          this._dragStartHeight = 0;
          this._dragStartWidth = 0;
          this._offsetTop = 0;
          this._offsetLeft = 0;
          // private _dialogStatus = DialogStatus.Closed;
          this._resizeDirection = ResizeDirection.None;
          this.styles = document.createElement('style');
          this._onDock = (direction = 'right') => async () => {
              const dialog = await this._dialog;
              dialog.style.removeProperty('inset');
              dialog.style.removeProperty('height');
              dialog.style.removeProperty('width');
              this.dock = direction;
              document.documentElement.style.setProperty('--me-dialog-dock-height', `${this.height}px`);
              document.documentElement.style.setProperty('--me-dialog-dock-width', `${this.width}px`);
              this._pushBody();
          };
          this._onUnDock = async () => {
              this.dock = 'none';
          };
          this._onDragMouseUp = () => {
              this._dialogInteraction = DialogInteraction.Idle;
              document.removeEventListener('mouseup', this._onDragMouseUp);
              document.removeEventListener('mousemove', this._onDragMouseMove);
          };
          this._onDragMouseMove = async (event) => {
              const dialog = await this._dialog;
              const diffX = event.clientX - this._dragStartX;
              const diffY = event.clientY - this._dragStartY;
              switch (this._dialogInteraction) {
                  case DialogInteraction.Move:
                      dialog.style.left = `${Math.min(Math.max(0, this._offsetLeft + diffX), window.innerWidth - dialog.offsetWidth)}px`;
                      dialog.style.top = `${this._offsetTop + diffY}px`;
                      dialog.style.right = 'auto';
                      dialog.style.bottom = 'auto';
                      break;
                  case DialogInteraction.Resize:
                      switch (this._resizeDirection) {
                          case ResizeDirection.N:
                              this.height = Math.min(this._dragStartHeight - diffY, window.innerHeight);
                              document.documentElement.style.setProperty('--me-dialog-dock-height', `${this.height}px`);
                              break;
                          case ResizeDirection.E:
                              this.width = Math.min(this._dragStartWidth + diffX, window.innerWidth);
                              document.documentElement.style.setProperty('--me-dialog-dock-width', `${this.width}px`);
                              break;
                          case ResizeDirection.S:
                              this.height = Math.min(this._dragStartHeight + diffY, window.innerHeight);
                              document.documentElement.style.setProperty('--me-dialog-dock-height', `${this.height}px`);
                              break;
                          case ResizeDirection.W:
                              this.width = Math.max(0, Math.min(this._dragStartWidth - diffX, window.innerWidth));
                              document.documentElement.style.setProperty('--me-dialog-dock-width', `${this.width}px`);
                              break;
                      }
                      break;
              }
          };
          /**
           * Sets padding on the <body> element for to compensate for any
           * push enabled docked dialogs.
           */
          this._pushBody = () => {
              const padding = { top: '', right: '', bottom: '', left: '' };
              // Loop over all dialogs in case of multiples.
              if (this.open && this.push) {
                  switch (this.dock) {
                      case 'top':
                          padding.top = 'padding-top: var(--me-dialog-offset-top, var(--me-dialog-dock-height)) !important;';
                          break;
                      case 'right':
                          padding.right = 'padding-right: var(--me-dialog-offset-right, var(--me-dialog-dock-width)) !important;';
                          break;
                      case 'bottom':
                          padding.bottom = 'padding-bottom: var(--me-dialog-offset-bottom, var(--me-dialog-dock-height)) !important;';
                          break;
                      case 'left':
                          padding.left = 'padding-left: var(--me-dialog-offset-left, var(--me-dialog-dock-width)) !important;';
                          break;
                  }
              }
              // Write the styles to a stylesheet specific to this dialog.
              this.styles.innerHTML = `body {
      transition: padding var(--me-dialog-duration, 200) var(--me-dialog-timing, ease-out);
      ${Object.values(padding).filter(value => value).join('\n')}
    }`;
          };
      }
      connectedCallback() {
          super.connectedCallback();
          this.styles.setAttribute('class', 'mercury-dialog-styles');
          document.head.appendChild(this.styles);
      }
      disconnectedCallback() {
          super.disconnectedCallback();
          this.styles.remove();
      }
      _getResizeDirection() {
          switch (this.dock) {
              case 'top':
                  return ResizeDirection.S;
              case 'right':
                  return ResizeDirection.W;
              case 'bottom':
                  return ResizeDirection.N;
              case 'left':
                  return ResizeDirection.E;
              default:
                  return ResizeDirection.None;
          }
      }
      /**
       *  Mimic the HTMLDialogElement close event.
       */
      async _handleClose() {
          const dialog = await this._dialog;
          this.returnValue = dialog.returnValue;
          this.open = false;
          this._pushBody();
          this.dispatchEvent(new Event('close'));
      }
      /**
       *  Mimic the HTMLDialogElement cancel event.
       */
      async _handleCancel() {
          const dialog = await this._dialog;
          this.returnValue = dialog.returnValue;
          this.dispatchEvent(new Event('cancel'));
      }
      async _keydownHandler(event) {
          if (event.code === 'Escape') {
              const rootElement = this.getRootNode();
              const domElement = rootElement.querySelector(`#${this.id}`);
              if (domElement && !this.hideCloseButton && domElement.contains(rootElement.activeElement)) {
                  this._handleClose();
              }
          }
      }
      render() {
          return y `
      <dialog
        id="dialog"
        part="dialog"
        data-dock=${this.dock}
        @close=${this._handleClose}
        @cancel=${this._handleCancel}
        class=${[this.moveable && 'is-moveable', this.resizable && (this.dock === 'none' || !this.dock) ? 'is-resizable' : 'not-resizable', `is-${this._dialogInteraction}`].join(' ')}
      >
        ${this.title || !this.hideCloseButton
            ? y `<header @mousedown=${this._onMoveMouseDown}>
              ${this.title ? y `<h2>${this.title}</h2>` : y ``}
              <div class="buttons">
                ${this.moveable && this.moveBtn
                ? y `<button
                      @mousedown=${this._onMoveMouseDown}
                      part="drag-button"
                      id="dragButton"
                    >
                      <i></i>
                      <span>Drag</span>
                    </button>`
                : y ``}
                ${!this.dockable
                ? ''
                : this.dock === 'none'
                    ? y `<button
                        @click=${this._onDock()}
                        part="dock-button"
                        id="dockButton"
                      >
                        <i></i>
                        <span>Dock</span>
                      </button>`
                    : y `<button
                        @click=${this._onUnDock}
                        part="undock-button"
                        id="undockButton"
                      >
                      <i></i>
                      <span>Undock</span>
                      </button>`}
                <form method="dialog">
                  ${!this.hideCloseButton
                ? y `<button
                      @click=${this._onCloseClick}
                      part="close-button"
                      id="closeButton"
                    >
                      <i></i>
                      <span>Close</span>
                    </button>`
                : y ``}
                </form>
              </div>
            </header>`
            : y ``}
          ${this.resizable && this.dock !== 'none'
            ? y `<button
            @mousedown=${this._onResizeMouseDown}
            id="resizeButton"
            data-resize-dir=${this._getResizeDirection()}
            >
              <span>Resize</span>
            </button>`
            : y ``}
          <main>
            <slot></slot>
          </main>
          <footer @mousedown=${this._onMoveMouseDown}>
            <slot name="footer"></slot>
          </footer>
        </dialog>
    `;
      }
      updated(changedProperties) {
          if (changedProperties.has('dock') || changedProperties.has('push') || changedProperties.has('modal')) {
              this._pushBody();
          }
          if (this.open) {
              this.getRootNode().addEventListener('keydown', (e) => this._keydownHandler(e));
          }
          else {
              this.getRootNode().removeEventListener('keydown', (e) => this._keydownHandler(e));
          }
      }
      /**
       * showModal
       * Shows the dialog as a modal with a background overlay.
       */
      async showModal() {
          this.modal = true;
          this.open = true;
          if (this.isDocked()) {
              this._onDock();
          }
          (await this._dialog).showModal();
          this.dispatchEvent(new Event('open'));
      }
      /**
       * show
       * Shows the dialog.
       */
      async show() {
          this.modal = false;
          this.open = true;
          if (this.isDocked()) {
              await this._onDock(this.dock)();
          }
          (await this._dialog).show();
          this.dispatchEvent(new Event('open'));
      }
      /**
       * close
       * Closes the dialog.
       */
      async close() {
          if (this.isDocked()) {
              await this._onDock(this.dock)();
          }
          (await this._dialog).close();
      }
      /**
       * isDocked
       * True if docked.
       */
      isDocked() {
          return this.dock && this.dock !== 'none';
      }
      _onCloseClick() {
          this.open = false;
      }
      async _onResizeMouseDown(event) {
          this._dialogInteraction = DialogInteraction.Resize;
          if (event.target instanceof HTMLButtonElement) {
              const dir = event.target.getAttribute('data-resize-dir');
              this._resizeDirection = dir;
          }
          this._onDragMouseDown(event);
      }
      async _onMoveMouseDown(event) {
          if (this.moveable) {
              this._dialogInteraction = DialogInteraction.Move;
              this.dock = 'none';
              this._onDragMouseDown(event);
          }
      }
      async _onDragMouseDown(event) {
          const dialog = await this._dialog;
          this._dragStartX = event.clientX;
          this._dragStartY = event.clientY;
          this._dragStartHeight = this.height;
          this._dragStartWidth = this.width;
          this._offsetLeft = dialog.offsetLeft;
          this._offsetTop = dialog.offsetTop;
          document.addEventListener('mouseup', this._onDragMouseUp);
          document.addEventListener('mousemove', this._onDragMouseMove);
      }
  };
  MercuryDialog.styles = i$2 `
    :host {
      --me-resize-button-size: 8px;
      display: block;
      font-family: var(--me-font-family, sans-serif);
      z-index: var(--me-dialog-z-index, 1255);
      position: relative;
    }

    dialog {
      border-style: var(--me-border-style, solid);
      border-width: var(--me-border-width, 1px);
      border-color: var(--me-border-color, #e5e5e5);
      box-shadow: 0 1px 2px rgb(20 45 82 / 2%), 0 3px 4px rgb(20 45 82 / 3%), 0 5px 8px rgb(20 45 82 / 4%);
      padding: 0;
      position: fixed;
      margin: auto;
      inset: var(--me-dialog-position-top, 0px) var(--me-dialog-position-right, 0px) var(--me-dialog-position-bottom, 0px) var(--me-dialog-position-left, 0px);
      overflow: auto;
      width: var(--me-dialog-width, var(--me-dialog-width-default, fit-content));
      height: var(--me-dialog-height, var(--me-dialog-height-default, fit-content));
      min-width: var(--me-dialog-min-width, min-content);
      max-width: calc(100vw - var(--me-dialog-viewport-offset, 80px));
      max-height: calc(100vh - var(--me-dialog-viewport-offset, 80px));
      z-index: 1000;
    }

    dialog.is-resizable {
      resize: both;
    }

    dialog.is-resize ::slotted(*) {
      pointer-events: none;
    }

    dialog[open] {
      display: flex;
      flex-direction: column;
      justify-content: stretch;
    }

    dialog[data-dock='left'] {
      height: auto;
      inset: var(--me-dialog-position-top, 0px) var(--me-dialog-position-right, auto) var(--me-dialog-position-bottom, 0px) var(--me-dialog-position-left, 0px);
      margin: 0 auto 0 0;
      max-height: 100dvh;
      max-width: 100dvw;
      width: var(--me-dialog-dock-width, var(--me-dialog-width-default, 400px));
    }

    dialog[data-dock='right'] {
      height: auto;
      inset: var(--me-dialog-position-top, 0px) var(--me-dialog-position-right, 0px) var(--me-dialog-position-bottom, 0px) var(--me-dialog-position-left, auto);
      margin: 0 0 0 auto;
      max-height: 100dvh;
      max-width: 100dvw;
      width: var(--me-dialog-dock-width, var(--me-dialog-width-default, 400px));
    }

    dialog[data-dock='bottom'] {
      inset: var(--me-dialog-position-top, auto) var(--me-dialog-position-right, 0px) var(--me-dialog-position-bottom, 0px) var(--me-dialog-position-left, 0px);
      margin: auto 0 0 0;
      width: auto;
      max-width: 100dvw;
      height: var(--me-dialog-dock-height, var(--me-dialog-height-default, 400px));
    }

    dialog[data-dock='top'] {
      inset: var(--me-dialog-position-top, 0px) var(--me-dialog-position-right, 0px) var(--me-dialog-position-bottom, auto) var(--me-dialog-position-left, 0px);
      margin: 0 0 auto 0;
      width: auto;
      max-width: 100dvw;
      height: var(--me-dialog-dock-height, var(--me-dialog-height-default, 400px));
    }

    dialog::backdrop {
      background-color: black;
      opacity: 0.4;
    }

    #dragButton {
      cursor: move;
    }

    header {
      background-color: var(--me-dialog-header-background-color, #fff);
      display: flex;
      justify-content: space-between;
      padding: var(--me-dialog-header-space-inset-y, var(--me-space-inset-y, 5px)) var(--me-dialog-header-space-inset-x, var(--me-space-inset-x, 20px));
      border-bottom-style: var(--me-border-style, solid);
      border-bottom-width: var(--me-border-width, 1px);
      border-bottom-color: var(--me-border-color, #e5e5e5);
      position: sticky;
      top: 0;
    }

    dialog.is-moveable header {
      cursor: grab;
    }

    h2 {
      font-size: var(--me-label-font-size, 16px);
      line-height: var(--me-label-line-height, 1.1);
      margin-inline-end: var(--me-space-inset, .5em);
    }

    main {
      position: relative;
      background-color: var(--me-dialog-main-background-color, #fff);
      padding: var(--me-dialog-main-space-inset-y, var(--me-space-inset-y, 20px)) var(--me-dialog-main-space-inset-y, var(--me-space-inset-y, 20px));
      overflow-y: auto;
      flex-grow: 1;
      flex-shrink: 1;
      flex-basis: fit-content;
    }

    .buttons {
      display: flex;
      justify-content: flex-end;
      margin-inline-end: -10px;
    }

    form[method='dialog'] {
      align-items: stretch;
      display: flex;
    }

    button {
      height: var(--me-dialog-icon-button-height, 40px);
      width: var(--me-dialog-icon-button-width, 40px);
      border: none;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      border-radius: var(--me-dialog-icon-button-radius, 3px);
      background-color: var(--me-dialog-icon-button-background-color, #fff);
      transition: all .2s ease-out;
    }

    button:hover {
      background-color: var(--me-dialog-icon-button-background-color-hover, #efefef);
    }

    button[data-resize-dir] {
      position: absolute;
      opacity: .5;
      border-radius: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0;
      z-index: 10;
    }

    button[data-resize-dir]:after {
      content: "";
      display: block;
      border: 0 #888 solid;
    }

    button[data-resize-dir="e"],
    button[data-resize-dir="w"] {
      cursor: ew-resize;
      height: auto;
      width: var(--me-resize-button-size);
    }

    button[data-resize-dir="e"]:after,
    button[data-resize-dir="w"]:after {
      height: 2em;
      width: 3px;
      border-left-width: 1px;
      border-right-width: 1px;
    }

    button[data-resize-dir="e"] {
      inset: 0 0 0 auto;
      justify-content: flex-start;
    }

    button[data-resize-dir="w"] {
      inset: 0 auto 0 0;
      justify-content: flex-end;
    }

    button[data-resize-dir="n"],
    button[data-resize-dir="s"] {
      cursor: ns-resize;
      height: var(--me-resize-button-size);
      width: auto;
    }

    button[data-resize-dir="n"]:after,
    button[data-resize-dir="s"]:after {
      width: 2em;
      height: 3px;
      border-top-width: 1px;
      border-bottom-width: 1px;
    }

    button[data-resize-dir="n"] {
      inset: 0 0 auto 0;
      align-items: flex-end;
    }

    button[data-resize-dir="s"] {
      inset: auto 0 0 0;
      align-items: flex-start;
    }

    ::slotted([slot="footer"]) {
      background-color: var(--me-dialog-footer-background-color, #fff);
      padding: var(--me-dialog-footer-space-inset-y, var(--me-space-inset-y, 5px)) var(--me-dialog-footer-space-inset-x, var(--me-space-inset-x, 20px));
      border-top-style: var(--me-border-style, solid);
      border-top-width: var(--me-border-width, 1px);
      border-top-color: var(--me-border-color, #e5e5e5);
      position: sticky;
      bottom: 0;
    }

    footer ::slotted(button) {
    }
    dialog.is-moveable footer {
      cursor: grab;
    }

    button i {
      background-position: center;
      background-repeat: no-repeat;
      display: block;
      height: 50%;
      width: 50%;
    }

    button span {
      position: absolute !important;
      overflow: hidden;
      clip: rect(1px,1px,1px,1px);
      width: 1px;
      height: 1px;
      word-wrap: normal;
    }

    #closeButton i {
      background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.--><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3l105.4 105.3c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256l105.3-105.4z"/></svg>');
    }

    #dragButton i {
      background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.--><path d="M278.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-64 64c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l9.4-9.4V224H109.3l9.4-9.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-64 64c-12.5 12.5-12.5 32.8 0 45.3l64 64c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-9.4-9.4H224v114.8l-9.4-9.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l64 64c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-9.4 9.4V288h114.8l-9.4 9.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-64-64c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l9.4 9.4H288V109.3l9.4 9.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-64-64z"/></svg>');
    }

    #dockButton i {
      background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.--><path d="M7.724 65.49A64.308 64.308 0 0 1 32 40.56a63.55 63.55 0 0 1 25.46-8.23c2.15-.22 4.33-.33 6.54-.33h384c35.3 0 64 28.65 64 64v320c0 35.3-28.7 64-64 64H64c-35.35 0-64-28.7-64-64V96c0-2.21.112-4.39.33-6.54a63.634 63.634 0 0 1 7.394-23.97zM48 416c0 8.8 7.16 16 16 16h384c8.8 0 16-7.2 16-16V224H48v192z"/></svg>');
    }

    #undockButton i {
      background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.--><path d="M432 48H208c-17.7 0-32 14.33-32 32v16h-48V80c0-44.18 35.8-80 80-80h224c44.2 0 80 35.82 80 80v224c0 44.2-35.8 80-80 80h-16v-48h16c17.7 0 32-14.3 32-32V80c0-17.67-14.3-32-32-32zm-112 80c35.3 0 64 28.7 64 64v256c0 35.3-28.7 64-64 64H64c-35.35 0-64-28.7-64-64V192c0-35.3 28.65-64 64-64h256zM64 464h256c8.8 0 16-7.2 16-16V256H48v192c0 8.8 7.16 16 16 16z"/></svg>');
    }
  `;
  __decorate([
      e$1({ type: Boolean, reflect: true })
  ], MercuryDialog.prototype, "open", void 0);
  __decorate([
      e$1({ type: Boolean, reflect: true })
  ], MercuryDialog.prototype, "modal", void 0);
  __decorate([
      e$1({ type: Boolean, reflect: true })
  ], MercuryDialog.prototype, "moveable", void 0);
  __decorate([
      e$1({ type: Boolean, reflect: true })
  ], MercuryDialog.prototype, "moveBtn", void 0);
  __decorate([
      e$1({
          type: DockableDirection,
          reflect: true,
      })
  ], MercuryDialog.prototype, "dock", void 0);
  __decorate([
      e$1({ type: Boolean, reflect: true })
  ], MercuryDialog.prototype, "push", void 0);
  __decorate([
      e$1({ type: Boolean, reflect: true })
  ], MercuryDialog.prototype, "dockable", void 0);
  __decorate([
      e$1({ type: Boolean, reflect: true, attribute: 'hide-close-button' })
  ], MercuryDialog.prototype, "hideCloseButton", void 0);
  __decorate([
      e$1({ type: Number, reflect: true })
  ], MercuryDialog.prototype, "backdropOpacity", void 0);
  __decorate([
      e$1({ type: String, attribute: false })
  ], MercuryDialog.prototype, "returnValue", void 0);
  __decorate([
      e$1({ type: Number, reflect: true })
  ], MercuryDialog.prototype, "height", void 0);
  __decorate([
      e$1({ type: Number, reflect: true })
  ], MercuryDialog.prototype, "width", void 0);
  __decorate([
      e$1({ type: Boolean, reflect: true })
  ], MercuryDialog.prototype, "resizable", void 0);
  __decorate([
      e$1({ type: DialogInteraction, attribute: false })
  ], MercuryDialog.prototype, "_dialogInteraction", void 0);
  __decorate([
      e$1({ type: String, reflect: true })
  ], MercuryDialog.prototype, "title", void 0);
  __decorate([
      e('#dialog')
  ], MercuryDialog.prototype, "_dialog", void 0);
  MercuryDialog = __decorate([
      e$2('mercury-dialog')
  ], MercuryDialog);

})();
