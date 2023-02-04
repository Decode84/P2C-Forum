import './bootstrap';
import Alpine from 'alpinejs'

import Editor from '@toast-ui/editor'
 // import 'codemirror/lib/codemirror.css';
import '@toast-ui/editor/dist/toastui-editor.css';
import '@toast-ui/editor/dist/theme/toastui-editor-dark.css';

window.Alpine = Alpine

Alpine.start()

const editor = new Editor({
  el: document.querySelector('#editor'),
  height: '200px',
  initialEditType: 'markdown',
  placeholder: '',
  // initialValue: body,
  theme: 'dark',
});

if (document.querySelector('#createReplyForm')) {
    document.querySelector('#createReplyForm').addEventListener('submit', e => {
        e.preventDefault();
        document.querySelector('#content').value = editor.getMarkdown();
        e.target.submit();
    });
}

if (document.querySelector('#createTopicForm')) {
    document.querySelector('#createTopicForm').addEventListener('submit', e => {
        e.preventDefault();
        document.querySelector('#content').value = editor.getMarkdown();
        e.target.submit();
    });
}

if (document.querySelector('#editReplyForm')) {
    editor.setMarkdown(document.querySelector('#oldContent').value);

    document.querySelector('#editReplyForm').addEventListener('submit', e => {
        e.preventDefault();
        document.querySelector('#content').value = editor.getMarkdown();
        e.target.submit();
    });
}

if (document.querySelector('#editTopicForm')) {
    editor.setMarkdown(document.querySelector('#oldContent').value);

    document.querySelector('#editTopicForm').addEventListener('submit', e => {
        e.preventDefault();
        document.querySelector('#content').value = editor.getMarkdown();
        e.target.submit();
    });
}
