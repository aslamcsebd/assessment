<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- Bootstrap v4.6.0 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>

{{-- Pushmenu --}}
<script src="{{ asset('js/custom.js') }}"></script>

{{-- dataTables --}}
<script src="{{ asset('js/dataTables.min.js') }}"></script>

<!-- summernote -->
{{-- <script src="{{ asset('/') }}summernote/summernote.min.js" ></script> --}}

<!-- Datepicker -->
<script src="{{ asset('/') }}js/datepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
    // if ($(window).width() > 992) {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 0) { //default: 40
            $('#navbar_top').addClass("fixed-top");
            // add padding top to show content behind navbar
            $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
        } else {
            $('#navbar_top').removeClass("fixed-top");
            // remove padding top from body
            $('body').css('padding-top', '0');
        }
    });
    // } // end

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 5000);

    $(".datepicker").datepicker({
        format: "dd-mm-yyyy",
        // startView: "months", 
        // minViewMode: "months"
    });

    $(document).ready(function() {
        $('.table').DataTable();
    });

    $(document).ready(function() {
        $('.summernote').summernote();
    });

    //redirect to specific tab
    $(document).ready(function() {
        $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
    });

    // Member payment type
    $("#paymentType").prop("selectedIndex", -1);

    // Category add
    $("#paymentType").click(function() {
        var e = document.getElementById("paymentType");
        var value = e.selectedIndex;
        // var chkFormationDept = e.value;

        if (value == 0) {
            $('#monthly [data_id="monthlyFee"]').parent().removeClass('active').css('display', 'block');
        }
        if (value == 1) {
            $('#monthly [data_id="monthlyFee"]').parent().removeClass('active').css('display', 'none');
        }
    })

    // Member paid (%)
    $("#paidNo").click(function() {
        var chkFormationDept = document.getElementById("paidNo").checked;
        if (chkFormationDept) {
            $('#paidStatus [data_id="paidAction"]').parent().removeClass('active').css('display', 'none');
        }
    })

    $("#paidYes").click(function() {
        var chkFormationDept = document.getElementById("paidYes").checked;
        if (chkFormationDept) {
            $('#paidStatus [data_id="paidAction"]').parent().removeClass('active').css('display', 'block');
        }
    })

    // Category edit
    $(document).ready(function() {

        var e = document.getElementById("paymentType2");
        var value = e.selectedIndex;
        // var chkFormationDept = e.value;

        if (value == 0) {
            $('#monthly2 [data_id="monthlyFee2"]').parent().removeClass('active').css('display', 'block');
        }
        if (value == 1) {
            $('#monthly2 [data_id="monthlyFee2"]').parent().removeClass('active').css('display', 'none');
        }
    })

    $("#paymentType2").click(function() {
        var e = document.getElementById("paymentType2");
        var value = e.selectedIndex;
        // var chkFormationDept = e.value;

        if (value == 0) {
            $('#monthly2 [data_id="monthlyFee2"]').parent().removeClass('active').css('display', 'block');
        }
        if (value == 1) {
            $('#monthly2 [data_id="monthlyFee2"]').parent().removeClass('active').css('display', 'none');
        }
    })

    // Member paid (%)
    $(document).ready(function() {
        var value = document.querySelector('#paidMatter input[name="paid"]:checked').value;

        if (value == 'yes') {
            $('#paidStatus [data_id="paidAction"]').parent().removeClass('active').css('display', 'block');
        } else {
            $('#paidStatus [data_id="paidAction"]').parent().removeClass('active').css('display', 'none');
        }

    })

    $(document).ready(function() {
        $('.multiple-checkboxes').multiselect({
            includeSelectAllOption: true,
        });
    });

    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });

    // Status change
    $(document).ready(function() {
        $('.status').change(function() {

            let model = $(this).data('model');
            let field = $(this).data('field');
            let id = $(this).data('id');
            let tab = $(this).data('tab');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('status') }}',
                data: {
                    'model': model,
                    'field': field,
                    'id': id,
                    'tab': tab
                },
                success: function(data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 100;
                    toastr.success(data.message);
                }
            });
        });
    });

    // Login page

    function yesIDo() {
        $("#parentDiv").css("display", "none");
        $("#loginInfo").css({
            "display": "block",
            "text-align": "justify"
        });
    }

    function yesIDo2() {
        $("#parentDiv").css("display", "block");
        $("#loginInfo").css("display", "none");
    }

    function yesIDo3() {
        $("#parentDiv").css("display", "block");
        $("#loginInfo").css("display", "none");
    }

    // 900-730 1080-937
    // let height = screen.height-170; html 993, nav 56
    // divElement = document.querySelector("#navbar_top");
    // elemHeight = divElement.offsetHeight;
    // let height = '937';
    // document.getElementById("animalImage").style.height = height+'px';


</script>
