<script>
    
    var page = 1;
    var isLoading = false;
    $(window).scroll(function () {

            if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 50)) {

                if(isLoading) return;
                page++;
                isLoading = true;
                infiniteLoadMore(page)

            }

        });

    function infiniteLoadMore(page)
    {
        $.ajax({

            type : 'get',
            url : '{{url('products')}}' + "?page=" + page,

            beforeSend: function () {

                    $('.auto-load').show();

                },

            success:function(data)
            {   
                if (data.html === "" || data.html == null) {
                    // no more data
                    $('.auto-load').html("No more products to load.");
                    return;
                }
                $('#data-wrapper').append(data.html)
                $('.auto-load').hide();
                isLoading = false;
            },
            error: function () {
                $('.auto-load').html("Error loading more data.");
                isLoading = false; // reset on error
            }   
        })
    }
</script>