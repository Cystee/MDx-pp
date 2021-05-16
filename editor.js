//editor.js
(function() {
    /* Register the buttons */
    tinymce.create('tinymce.plugins.MyButtons', {
        init: function(ed, url) {
            /**
             * 定义按钮子菜单
             */
            ed.addButton('button_eek', {
                text: '样式',
                type: 'menubutton',
                menu: [{
                        text: '其他语言代码块',
                        onclick: function() {
                            ed.windowManager.open({
                                title: '插入其他语言代码',
                                body: [{
                                        type: 'textbox',
                                        name: 'textboxName',
                                        label: '语言',
                                        value: 'python'
                                    },
                                    {
                                        type: 'textbox',
                                        name: 'textboxCode',
                                        label: '代码',
                                        multiline: true,
                                        minWidth: 500,
                                        minHeight: 100,
                                        spellcheck: false
                                    }
                                ],
                                onsubmit: function(e) {
                                    ed.insertContent('<pre><code class="language-' + e.data.textboxName + '">' + ed.dom.encode(e.data.textboxCode) + '</code></pre>');
                                }
                            })
                        }
                    },
                    {
                        text: 'HTML 代码块',
                        onclick: function() {
                            ed.windowManager.open({
                                title: '插入 HTML 代码',
                                body: [{
                                    type: 'textbox',
                                    name: 'textboxCode',
                                    multiline: true,
                                    minWidth: 500,
                                    minHeight: 100,
                                    spellcheck: false
                                }],
                                onsubmit: function(e) {
                                    ed.insertContent('<pre><code class="language-markup">' + ed.dom.encode(e.data.textboxCode) + '</code></pre>');
                                }
                            })
                        }
                    },
                    {
                        text: '其他语言行内代码',
                        onclick: function() {
                            ed.windowManager.open({
                                title: '插入其他语言行内代码',
                                body: [{
                                        type: 'textbox',
                                        name: 'textboxName',
                                        label: '语言',
                                        value: 'python'
                                    },
                                    {
                                        type: 'textbox',
                                        name: 'textboxCode',
                                        label: '代码',
                                        multiline: true,
                                        minWidth: 500,
                                        minHeight: 100,
                                        spellcheck: false
                                    }
                                ],
                                onsubmit: function(e) {
                                    ed.insertContent('<code class="language-' + e.data.textboxName + '">' + ed.dom.encode(e.data.textboxCode) + '</code>');
                                }
                            })
                        }
                    },
                    {
                        text: 'HTML 行内代码',
                        onclick: function() {
                            ed.windowManager.open({
                                title: '插入 HTML 行内代码',
                                body: [{
                                    type: 'textbox',
                                    name: 'textboxCode',
                                    multiline: true,
                                    minWidth: 500,
                                    minHeight: 100,
                                    spellcheck: false
                                }],
                                onsubmit: function(e) {
                                    ed.insertContent('<code class="language-markup">' + ed.dom.encode(e.data.textboxCode) + '</code>');
                                }
                            })
                        }
                    },
                    {
                        text: '预格式链接',
                        onclick: function() {
                            ed.windowManager.open({
                                title: '插入预格式链接',
                                body: [{
                                    type: 'textbox',
                                    name: 'textboxCode',
                                    multiline: true,
                                    minWidth: 500,
                                    minHeight: 100,
                                    spellcheck: false
                                }],
                                onsubmit: function(e) {
                                    ed.insertContent('<pre class="prelink">' + ed.dom.encode(e.data.textboxCode) + '</pre>');
                                }
                            })
                        }
                    }
                ]
            });

            /**
             * 定义制表符
             */
            ed.addButton('button_green', {
                text: 'TAB',
                title: '插入制表符',
                onclick: function() {
                    ed.selection.setContent('\t');
                },
            });
        },
        createControl: function(n, cm) {
            return null;
        },
    });
    /* Start the buttons */
    tinymce.PluginManager.add('my_button_script', tinymce.plugins.MyButtons);
})();