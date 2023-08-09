import '/node_modules/codemirror/lib/codemirror.js';
import '/node_modules/codemirror/lib/codemirror.css'
import '/node_modules/codemirror/theme/dracula.css'
import '/node_modules/codemirror/addon/mode/multiplex.js'
import '/node_modules/codemirror/mode/xml/xml.js'
import '/node_modules/codemirror/addon/edit/closetag.js'
import '/node_modules/codemirror/addon/edit/closebrackets.js'
import '/node_modules/codemirror/mode/twig/twig.js'
import '/node_modules/codemirror/mode/css/css.js'



if( document.getElementById("editor")) {
  window.editor =  CodeMirror.fromTextArea(document.getElementById("editor"), {
    lineNumbers: true,
    mode: {name: "twig", base: "text/html"},
    theme:'dracula',
    autoCloseTags: true
  });
}

if( document.getElementById("styles")) {
  window.styles =  CodeMirror.fromTextArea(document.getElementById("styles"), {
    lineNumbers: true,
    mode: 'css',
    theme:'dracula',
    autoCloseTags: true
  });
}