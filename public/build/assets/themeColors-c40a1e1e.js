let c=document.querySelector("#colorID");c==null||c.addEventListener("input",C);let d=document.querySelector("#transparentBgColorID");d==null||d.addEventListener("input",w);const p=document.querySelectorAll("input.color-primary-light"),f=document.querySelectorAll("input.color-bg-transparent");k(p);I(f);P();const q=e=>{const o=document.querySelector(":root");Object.keys(e).forEach(r=>{o.style.setProperty(r,e[r])})},u=e=>/^#([A-Fa-f0-9]{3,4}){1,2}$/.test(e),i=(e,o)=>e.match(new RegExp(`.{${o}}`,"g")),m=e=>parseInt(e.repeat(2/e.length),16),L=(e,o)=>typeof e<"u"?e/255:typeof o!="number"||o<0||o>1?1:o;function y(e,o){if(!u(e))return null;const t=Math.floor((e.length-1)/3),r=i(e.slice(1),t),[l,a,v,b]=r.map(m);return`rgba(${l}, ${a}, ${v}, ${L(b,o)})`}function h(e){if(!u(e))return null;const o=Math.floor((e.length-1)/3),t=i(e.slice(1),o),[r,l,a]=t.map(m);return`${r}, ${l}, ${a}`}function k(e){e.forEach(o=>{o.addEventListener("input",t=>{document.querySelector("html").style.setProperty("--volgh-primary-rgb",h(t.target.value)),document.querySelector("html").style.setProperty("--volgh-primary-rgb1",`${t.target.value}`)})})}function I(e){e.forEach(o=>{o.addEventListener("input",t=>{const r=`--volgh-${t.target.getAttribute("data-id5")}`,l=`--volgh-${t.target.getAttribute("data-id6")}`;q({[r]:y(t.target.value,.86),[l]:t.target.value})})})}function C(){let e=document.getElementById("colorID").value;localStorage.setItem("volghprimaryColor",h(e)),localStorage.setItem("volghprimaryColor1",e),n()}function w(){let e=document.getElementById("transparentBgColorID").value;localStorage.setItem("volghdarkTheme",e),localStorage.setItem("volghdarkBody",e+"dd"),n(),document.querySelector("body").classList.add("dark-mode"),document.querySelector("body").classList.remove("light-mode"),$("#myonoffswitch2").prop("checked",!0),$("#myonoffswitch5").prop("checked",!0),$("#myonoffswitch8").prop("checked",!0)}let S,g,s;function n(){g=getComputedStyle(document.documentElement).getPropertyValue("--volgh-primary-rgb").trim(),s=getComputedStyle(document.documentElement).getPropertyValue("--volgh-primary-rgb1").trim(),S=localStorage.getItem("volghprimaryColor")||g,localStorage.getItem("volghprimaryColor1"),localStorage.getItem("volghprimaryColor")&&y(localStorage.getItem("volghprimaryColor"),.8),document.querySelector("#echart1")!==null&&E()}n();function P(){if(localStorage.getItem("volghprimaryColor")&&(document.getElementById("colorID")&&(document.getElementById("colorID").value=localStorage.getItem("volghprimaryColor")),document.querySelector("html").style.setProperty("--volgh-primary-rgb",localStorage.getItem("volghprimaryColor")),document.querySelector("html").style.setProperty("--volgh-primary-rgb1",localStorage.getItem("volghprimaryColor1"))),localStorage.getItem("volghbgColor")){if(document.getElementById("transparentBgColorID")&&(document.getElementById("transparentBgColorID").value=localStorage.getItem("volghbgColor")),document.querySelector("html").style.setProperty("--volgh-background",localStorage.getItem("volghbgColor")),document.querySelector("html").style.setProperty("--volgh-white-rgb",localStorage.getItem("volghbgwhite")),document.querySelector("html").style.setProperty("--volgh-menu-bg",localStorage.getItem("volghmenubg")),document.querySelector("html").style.setProperty("--volgh-header-bg",localStorage.getItem("volghheaderbg")),document.querySelector("html"),$("body").addClass("dark-mode"),!document.body.classList.contains("login-img")){document.querySelector(".app-header");let e=document.querySelector(".app-sidebar");e.style.setProperty("--volgh-white-rgb",localStorage.getItem("volghbgwhite")),e.style.setProperty("--volgh-menu-bg",localStorage.getItem("volghmenubg"))}$("#switchbtn-dark").prop("checked",!0),$("#switchbtn-darkmenu").prop("checked",!0),$("#switchbtn-darkheader").prop("checked",!0),localStorage.removeItem("volghHeader","dark"),localStorage.removeItem("volghMenu","dark"),localStorage.removeItem("volghHeader","light"),localStorage.removeItem("volghMenu","light")}localStorage.volghlightMode&&(document.querySelector("body").classList.remove("dark-mode"),document.querySelector("body").classList.add("light-mode")),localStorage.volghdarkMode&&(document.querySelector("body").classList.add("dark-mode"),document.querySelector("body").classList.remove("light-mode")),localStorage.volghhorizontal&&document.querySelector("body").classList.add("horizontal"),localStorage.volghhorizontalHover&&document.querySelector("body").classList.add("horizontal-hover"),localStorage.volghrtl&&document.querySelector("body").classList.add("rtl"),localStorage.volghdarkBody&&(document.querySelector("html").style.setProperty("--volgh-dark-theme",localStorage.volghdarkTheme),document.querySelector("html").style.setProperty("--volgh-dark-background",localStorage.volghdarkBody),document.querySelector("body").classList.add("dark-mode"),document.querySelector("body").classList.remove("light-mode"),$("#myonoffswitch2").prop("checked",!0),$("#myonoffswitch5").prop("checked",!0),$("#myonoffswitch8").prop("checked",!0)),localStorage.volghclosedmenu&&(document.querySelector("body").classList.add("closed-leftmenu"),document.querySelector("body").classList.add("sidenav-toggled")),localStorage.volghicontextmenu&&(document.querySelector("body").classList.add("icontext-menu"),document.querySelector("body").classList.add("sidenav-toggled")),localStorage.volghsideiconmenu&&(document.querySelector("body").classList.add("icon-overlay"),document.querySelector("body").classList.add("sidenav-toggled")),localStorage.volghhoversubmenu&&(document.querySelector("body").classList.add("hover-submenu"),document.querySelector("body").classList.add("sidenav-toggled")),localStorage.volghhoversubmenu1&&(document.querySelector("body").classList.add("hover-submenu1"),document.querySelector("body").classList.add("sidenav-toggled")),localStorage.volghdoublemenu&&document.querySelector("body").classList.add("double-menu"),localStorage.volghdoublemenutabs&&document.querySelector("body").classList.add("double-menu-tabs"),localStorage.volghscrollable&&document.querySelector("body").classList.add("scrollable-layout"),localStorage.volghboxedwidth&&document.querySelector("body").classList.add("layout-boxed"),localStorage.volghlayoutfullwidth&&document.querySelector("body").classList.add("layout-fullwidth"),localStorage.volghlightheader&&document.querySelector("body").classList.add("header-light"),localStorage.volghcolorheader&&document.querySelector("body").classList.add("color-header"),localStorage.volghdarkheader&&document.querySelector("body").classList.add("dark-header"),localStorage.volghlightmenu&&document.querySelector("body").classList.add("light-menu"),localStorage.volghcolormenu&&document.querySelector("body").classList.add("color-menu"),localStorage.volghdarkmenu&&document.querySelector("body").classList.add("dark-menu"),localStorage.volghgradientmenu&&document.querySelector("body").classList.add("gradient-menu"),localStorage.volghdefaultlogo&&document.querySelector("body").classList.add("default-logo"),localStorage.volghcenterlogo&&document.querySelector("body").classList.add("center-logo")}function E(){var e=[{name:"sales",type:"bar",data:[10,15,9,18,10,15]},{name:"profit",type:"line",smooth:!0,data:[8,5,25,10,10]},{name:"growth",type:"bar",data:[10,14,10,15,9,25]}],o=document.getElementById("echart1"),t=echarts.init(o),r={grid:{top:"6",right:"0",bottom:"17",left:"25"},xAxis:{data:["2014","2015","2016","2017","2018"],axisLine:{lineStyle:{color:"rgba(119, 119, 142, 0.2)"}},axisLabel:{fontSize:10,color:"#93a1ad"}},tooltip:{show:!0,showContent:!0,alwaysShowContent:!0,triggerOn:"mousemove",trigger:"axis",axisPointer:{label:{show:!1}}},yAxis:{splitLine:{lineStyle:{color:"rgba(119, 119, 142, 0.2)"}},axisLine:{lineStyle:{color:"rgba(119, 119, 142, 0.2)"}},axisLabel:{fontSize:10,color:"#93a1ad"}},series:e,color:["rgb("+S+")","#09ad95","#d43f8d"]};t.setOption(r),window.addEventListener("resize",function(){t.resize()})}export{n};
