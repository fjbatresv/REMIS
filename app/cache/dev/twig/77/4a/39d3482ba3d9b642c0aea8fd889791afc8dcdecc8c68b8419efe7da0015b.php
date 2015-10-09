<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_774a39d3482ba3d9b642c0aea8fd889791afc8dcdecc8c68b8419efe7da0015b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script>/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                options.maxTries = options.maxTries || 0;
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 !== xhr.readyState) {
                        return null;
                    }

                    if (xhr.status == 404 && options.maxTries > 1) {
                        setTimeout(function(){
                            options.maxTries--;
                            request(url, onSuccess, onError, payload, options);
                        }, 500);

                        return null;
                    }

                    if (200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className && el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                if (el.className) {
                    el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
                }
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) {
                    el.className += \" \" + klass;
                }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            };

        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            request: request,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        '',
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  75 => 28,  50 => 15,  42 => 12,  32 => 6,  30 => 5,  24 => 2,  1080 => 340,  1074 => 338,  1068 => 336,  1066 => 335,  1064 => 334,  1060 => 333,  1051 => 332,  1048 => 331,  1036 => 326,  1030 => 324,  1024 => 322,  1022 => 321,  1020 => 320,  1016 => 319,  1010 => 318,  1007 => 317,  995 => 312,  989 => 310,  983 => 308,  981 => 307,  979 => 306,  975 => 305,  971 => 304,  967 => 303,  963 => 302,  957 => 301,  954 => 300,  946 => 296,  942 => 295,  939 => 294,  930 => 287,  928 => 286,  924 => 285,  921 => 284,  916 => 280,  908 => 278,  904 => 277,  902 => 276,  900 => 275,  897 => 274,  891 => 271,  888 => 270,  884 => 267,  881 => 265,  879 => 264,  876 => 263,  869 => 259,  867 => 258,  843 => 257,  840 => 255,  837 => 253,  835 => 252,  833 => 251,  830 => 250,  826 => 247,  824 => 246,  822 => 245,  819 => 244,  815 => 239,  812 => 238,  808 => 235,  806 => 234,  804 => 233,  801 => 232,  797 => 229,  795 => 228,  793 => 227,  791 => 226,  789 => 225,  786 => 224,  782 => 221,  779 => 216,  774 => 212,  754 => 208,  751 => 206,  748 => 205,  745 => 203,  742 => 202,  739 => 200,  737 => 199,  735 => 198,  732 => 197,  728 => 192,  726 => 191,  723 => 190,  719 => 187,  717 => 186,  714 => 185,  704 => 182,  701 => 180,  699 => 179,  696 => 178,  692 => 175,  690 => 174,  687 => 173,  683 => 170,  681 => 169,  678 => 168,  673 => 165,  671 => 164,  668 => 163,  663 => 160,  661 => 159,  658 => 158,  654 => 155,  652 => 154,  649 => 153,  645 => 150,  643 => 149,  640 => 148,  636 => 145,  633 => 144,  629 => 141,  627 => 140,  624 => 139,  620 => 136,  617 => 135,  614 => 133,  609 => 129,  599 => 128,  594 => 127,  592 => 126,  589 => 124,  587 => 123,  584 => 122,  579 => 118,  577 => 116,  576 => 115,  575 => 114,  574 => 113,  570 => 112,  567 => 110,  565 => 109,  562 => 108,  556 => 104,  554 => 103,  552 => 102,  550 => 101,  548 => 100,  544 => 99,  541 => 97,  539 => 96,  536 => 95,  522 => 92,  519 => 91,  505 => 88,  502 => 87,  477 => 82,  474 => 80,  472 => 79,  470 => 78,  465 => 77,  463 => 76,  446 => 75,  443 => 74,  439 => 71,  437 => 70,  435 => 69,  429 => 66,  427 => 65,  425 => 64,  423 => 63,  421 => 62,  412 => 60,  410 => 59,  402 => 58,  399 => 56,  397 => 55,  394 => 54,  389 => 51,  383 => 49,  381 => 48,  377 => 47,  373 => 46,  370 => 45,  362 => 39,  360 => 38,  357 => 37,  346 => 33,  342 => 30,  339 => 28,  334 => 26,  330 => 23,  328 => 22,  326 => 21,  321 => 18,  317 => 17,  314 => 16,  300 => 13,  298 => 12,  290 => 7,  287 => 5,  285 => 4,  282 => 3,  278 => 331,  273 => 317,  270 => 316,  268 => 300,  265 => 299,  263 => 294,  260 => 293,  257 => 291,  255 => 284,  252 => 283,  250 => 274,  247 => 273,  245 => 270,  240 => 263,  237 => 262,  232 => 249,  227 => 243,  224 => 241,  222 => 238,  219 => 237,  217 => 232,  214 => 231,  212 => 224,  209 => 223,  207 => 216,  204 => 215,  201 => 213,  194 => 197,  191 => 196,  188 => 194,  186 => 190,  183 => 189,  173 => 177,  169 => 168,  166 => 167,  164 => 163,  161 => 162,  156 => 157,  154 => 153,  151 => 152,  146 => 147,  144 => 144,  134 => 133,  131 => 132,  129 => 122,  126 => 121,  124 => 108,  119 => 95,  114 => 91,  111 => 90,  106 => 86,  89 => 37,  86 => 36,  84 => 33,  81 => 32,  79 => 29,  74 => 16,  71 => 15,  66 => 25,  64 => 3,  61 => 2,  365 => 41,  359 => 106,  353 => 104,  351 => 103,  349 => 34,  345 => 101,  343 => 99,  337 => 27,  331 => 96,  327 => 95,  323 => 19,  319 => 93,  313 => 92,  311 => 91,  308 => 90,  295 => 11,  289 => 82,  283 => 80,  281 => 79,  279 => 78,  275 => 330,  269 => 76,  267 => 75,  264 => 74,  256 => 68,  249 => 66,  246 => 63,  242 => 269,  238 => 60,  235 => 250,  233 => 58,  230 => 244,  208 => 52,  205 => 51,  202 => 50,  199 => 212,  196 => 211,  193 => 47,  190 => 46,  187 => 45,  184 => 44,  181 => 185,  178 => 184,  176 => 178,  174 => 40,  171 => 173,  165 => 35,  159 => 158,  157 => 32,  153 => 31,  149 => 148,  141 => 143,  139 => 139,  136 => 138,  130 => 23,  121 => 107,  116 => 94,  113 => 19,  104 => 74,  99 => 54,  96 => 53,  94 => 45,  91 => 35,  78 => 7,  72 => 5,  70 => 26,  65 => 3,  63 => 2,  60 => 1,  56 => 90,  53 => 89,  51 => 74,  48 => 73,  46 => 14,  43 => 56,  41 => 39,  36 => 27,  31 => 13,  26 => 3,  109 => 87,  101 => 73,  95 => 55,  92 => 54,  83 => 30,  76 => 25,  69 => 11,  62 => 24,  54 => 29,  38 => 38,  33 => 26,  28 => 12,  19 => 1,);
    }
}
