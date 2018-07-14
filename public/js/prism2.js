<script>
document.addEventListener("DOMContentLoaded", function(event) {
    var editorCode = document.getElementById('code');
    // var editorContent = document.getElementById('editor-content');
    // var selector = document.getElementById('selector');
    // editorCode.innerHTML = Prism.highlight(editorContent.value, Prism.languages.javascript);


    alert('dupa');
    $('#dupa').on('click', function() {
        var zbigniew = $('#code').text();
        console.log(zbigniew);
        editorCode.innerHTML = Prism.highlight(zbigniew, Prism.languages.javascript);
    });


});

</script>
