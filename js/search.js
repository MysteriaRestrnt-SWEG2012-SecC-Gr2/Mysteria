 <script>
            function search() {
            let input = document.getElementById('query').value
            input=input.toLowerCase();
            let x = document.getElementsByClassName('searchable');

            for (i = 0; i < x.length; i++) {
            if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
            }
            else {
            x[i].style.display="list-item";
            }
            }
            }
    </script>