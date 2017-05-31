
<style type="text/css">
    body{
        font:1.2em normal Arial,sans-serif;
        color:#34495E;
    }

    h1{
        text-align:center;
        text-transform:uppercase;
        letter-spacing:-2px;
        font-size:2.5em;
        margin:20px 0;
    }

    .container{
        width:100%;
        margin:auto;
    }

    table{
        border-collapse:collapse;
        width:100%;
    }

    thead{
        color:black;
    }

    tbody tr:nth-child(even){
        background:#ECF0F1;
    }

    tbody tr:hover{
    background:#BDC3C7;
        color:black;
    }

    .fixed{
        top:0;
        position:fixed;
        width:auto;
        display:none;
        border:none;
    }

    .scrollMore{
        margin-top:600px;
    }

    .up{
        cursor:pointer;
    }

    .dis{
        display:none;
    }
</style>style>

<table id="table">
    <thead>
        <tr class="w3-blue">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>

<script type="text/javascript">
    ;(function($) {
        $.fn.fixMe = function() {
            return this.each(function() {
                var $this = $(this),
                    $t_fixed;
                function init() {
                    $this.wrap('<div class="container" />');
                    $t_fixed = $this.clone();
                    $t_fixed.find("tbody").remove().end().addClass("fixed").insertBefore($this);
                    resizeFixed();
                }
                function resizeFixed() {
                    $t_fixed.find("th").each(function(index) {
                       $(this).css("width",$this.find("th").eq(index).outerWidth()+"px");
                    });
                }
                function scrollFixed() {
                    var offset = $(this).scrollTop(),
                    tableOffsetTop = $this.offset().top,
                    tableOffsetBottom = tableOffsetTop + $this.height() - $this.find("thead").height();
                    if(offset < tableOffsetTop || offset > tableOffsetBottom)
                       $t_fixed.hide();
                    else if(offset >= tableOffsetTop && offset <= tableOffsetBottom && $t_fixed.is(":hidden"))
                       $t_fixed.show();
                }
                $(window).resize(resizeFixed);
                $(window).scroll(scrollFixed);
                init();
            });
        };
    })(jQuery);

    $(document).ready(function(){
        $("table").fixMe();
        $(".up").click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 2000);
        });
    });
</script>