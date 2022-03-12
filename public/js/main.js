// $(document).ready(function () {
//       $('.basic-form .checkbox input:checkbox').on('click', function () {
//           $(this).closest('.checkbox').find('.ch_for').toggle();
//       })
//   });

<script>
$(document).ready(function () {
    $('.basic-form .checkbox input:checkbox').on('click', function () {
        $(this).closest('.checkbox').find('.ch_for').toggle();
    })
});

<script>
        $(document).ready(function () {
            $("#chkRead").change(function () {
                if ($(this).is(":checked")) {
                    $('#berat').removeAttr("readonly")
                } else {
                    $('#berat').attr('readonly', true);
                }
            });
        });
</script>

