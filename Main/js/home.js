<script type="text/javascript">
        var count = 0;
        var btn = document.getElementById("btn");
        var disp = document.getElementById("display");

        btn.onclick = function () {
            count++;
            disp.innerHTML = count;
        }
    </script>