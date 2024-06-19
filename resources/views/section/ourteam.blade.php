<section class="page-section bg-light" id="team">
    <div class="container">
        @foreach ($sections as $section)
        @if ($section->cos === "4")
            <div class="text-center">
                <h2 class="section-heading text-uppercase editablePortfoli"  data-id="{{ $section->id }}" data-field="text_1" contenteditable="true">{{ $section->text_1 }}</h2>
                <h3 class="section-subheading text-muted editablePortfoli"   data-id="{{ $section->id }}" data-field="text_2" contenteditable="true">{{ $section->text_2 }}</h3>
            </div>
            <div class="row">
                @for ($i = 1; $i <= 3; $i++)
                <div class="col-lg-4">
                    <div class="team-member">



                        <img class="mx-auto rounded-circle" src="{{ asset('user/assets/img/team/' . $section->{'image_' . $i}) }}" onclick="document.getElementById('fileInput2{{ $i }}').click()" alt="..." />
                        
                        <div class="portfolio-caption">
                        <input type="file" class="file-input2" id="fileInput2{{ $i }}" data-id="{{ $section->id }}" data-field="image_{{ $i }}" style="display: none;" />
                    </div>



                        <h4 class="section-heading text-uppercase editablePortfoli"  data-id="{{ $section->id }}" data-field="{{'text_' . (3 + 2 * ($i - 1))}}" contenteditable="true">{{ $section->{'text_' . (3 + 2 * ($i - 1))} }}</h4>
                        <p class="text-muted editablePortfoli" data-id="{{ $section->id }}" data-field="{{'text_' . (4 + 2 * ($i - 1))}}" contenteditable="true">{{ $section->{'text_' . (4 + 2 * ($i - 1))} }}</p>
                    </div>
                </div>
                @endfor
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">{{ $section->text_9 }}</p>
                </div>á
            </div>
        @endif
        @endforeach
    </div>
</section>
<script>
    $(document).ready(function() {

        $('.file-input2').change(function() {
            var input = this;
            var sectionId = $(this).data('id');
            var field = $(this).data('field');

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_' + field.split('_')[1]).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);

                // Tạo form data để gửi file qua AJAX
                var formData = new FormData();
                formData.append('image2', input.files[0]);
                formData.append('id', sectionId);
                formData.append('field', field);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: '{{ route("update.image2") }}',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log('Cập nhật hình ảnh thành công');
                    },
                    error: function(xhr, status, error) {
                        console.error('Lỗi AJAX: ' + status + error);
                        showNotification('danger', 'Cập nhật hình ảnh thất bại');
                    }
                });
            }
        });

    })
</script>