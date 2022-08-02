            <script src="{{ asset('frontend/vendors/jquery.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/bootstrap/bootstrap.bundle.js') }}"></script>
            <script src="{{ asset('frontend/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/slick/slick.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/waypoints/jquery.waypoints.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/counter/countUp.js') }}"></script>
            <script src="{{ asset('frontend/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/chartjs/Chart.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/dropzone/js/dropzone.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/timepicker/bootstrap-timepicker.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/hc-sticky/hc-sticky.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/jparallax/TweenMax.min.js') }}"></script>
            <script src="{{ asset('frontend/vendors/mapbox-gl/mapbox-gl.js') }}"></script>
            <script src="{{ asset('frontend/vendors/dataTables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('frontend/js/theme.js') }}"></script>
            @stack('scripts')
<script>
$("#main_serach").on('keyup',function(){
    console.log($(this).val())
    $.ajax({
        url: "{{route('get-serach-result')}}",
        type:"GET",
        // cache: true,
        dataType : false,
        contentType: false,
        data:{value:$(this).val()},
        success:function(response){
            console.log(response.cards)
            $('body').find('#all_cards').html('');
            $('body').find('#all_cards').html(response.cards);
        },
    });
});

$(function() {
  var $tabButtonItem = $('#tab-button li'),
      $tabSelect = $('#tab-select'),
      $tabContents = $('.tab-contents'),
      activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();

  $tabButtonItem.find('a').on('click', function(e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabSelect.val(target);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });

  $tabSelect.on('change', function() {
    var target = $(this).val(),
        targetSelectNum = $(this).prop('selectedIndex');

    $tabButtonItem.removeClass(activeClass);
    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
    $tabContents.hide();
    $(target).show();
  });
});

</script>
