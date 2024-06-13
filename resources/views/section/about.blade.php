<style>
    .fixed-size1 {
        width: 150px;
        /* Đặt chiều rộng cố định cho hình ảnh */
        height: 150px;
        /* Đặt chiều cao cố định cho hình ảnh */
        object-fit: cover;
        /* Đảm bảo hình ảnh không bị méo */
    }
</style>

<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            @foreach ($sections as $section)
            @if ($section->image === "3")
            <h2 class="section-heading text-uppercase editablePortfoli" contenteditable="true" data-id="{{ $section->id }}" data-field="text_1">{{ $section->text_1 }}</h2>
        </div>
        <ul class="timeline">
            @for ($i = 1; $i <= 4; $i++) @php $imageField='image_' . $i; $textSubheadingField='text_' . ($i * 2); $textBodyField='text_' . ($i * 2 + 1); @endphp <li @if ($i % 2==0) class="timeline-inverted" @endif>
                <div class="timeline-image">
                    <img class="rounded-circle img-fluid fixed-size1" id="image_{{ $i }}" src="{{ asset('user/assets/img/about/' . $section->$imageField) }}" onclick="document.getElementById('fileInput1{{ $i }}').click()" alt="..." />
                    <div class="portfolio-caption">
                        <input type="file" class="file-input1" id="fileInput1{{ $i }}" data-id="{{ $section->id }}" data-field="image_{{ $i }}" style="display: none;" />
                        <i class="fas fa-plus fa-3x" onclick="document.getElementById('fileInput1{{ $i }}').click()"></i>
                    </div>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading editablePortfoli" data-id="{{ $section->id }}" data-field="{{$textSubheadingField}}" contenteditable="true">{{ $section->$textSubheadingField }}</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted editablePortfoli" data-id="{{ $section->id }}" data-field="{{$textBodyField}}" contenteditable="true">{{ $section->$textBodyField }}</p>
                    </div>
                </div>
                </li>
                @endfor
                <li class="timeline-inverted">
                    <div class="timeline-image">
                    </div>
                </li>
        </ul>
        @endif
        @endforeach
    </div>
</section>
<script>
    $(document).ready(function() {

        $('.file-input1').change(function() {
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
                formData.append('image1', input.files[0]);
                formData.append('id', sectionId);
                formData.append('field', field);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: '{{ route("update.image1") }}',
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