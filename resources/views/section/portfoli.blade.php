<style>
    .fixed-size {
        width: 100%; /* Đặt chiều rộng 100% của container */
        height: 200px; /* Đặt chiều cao cố định */
        object-fit: cover; /* Đảm bảo hình ảnh duy trì tỷ lệ khung hình */
    }
</style>

<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            @foreach ($sections as $section)
                @if ($section->cos === "2")
                    <h2 class="section-heading text-uppercase editablePortfoli" data-id="{{ $section->id }}" data-field="text_1" contenteditable="true">{{ $section->text_1 }}</h2>
                </div>
                <div class="row">
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal{{ $i }}">
                                    <img class="img-fluid fixed-size" id="image_{{ $i }}" src="{{ asset('user/assets/img/portfolio/' . $section->{'image_'.$i}) }}" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <input type="file" class="file-input" id="fileInput{{ $i }}" data-id="{{ $section->id }}" data-field="image_{{ $i }}" style="display: none;" />
                                    <i class="fas fa-plus fa-3x" onclick="document.getElementById('fileInput{{ $i }}').click()"></i>
                                    <div class="portfolio-caption-heading editablePortfoli" data-id="{{ $section->id }}" data-field="text_{{ $i+1 }}" contenteditable="true">{{ $section->{'text_'.($i+1)} }}</div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @guest
            document.querySelectorAll('.editablePortfoli').forEach(function(element) {
                element.setAttribute('contenteditable', 'false');
            });
            document.querySelectorAll('.file-input').forEach(function(element) {
                element.style.display = 'none';
            });
            document.querySelectorAll('.fa-plus').forEach(function(element) {
                element.style.display = 'none';
            });
        @endguest
    });
</script>


<script>
    $(document).ready(function() {
        $('.editablePortfoli').on('focus', function() {
            $(this).data('original-text', $(this).text());
        }).on('blur', function() {
            var $this = $(this);
            var id = $this.data('id');
            var field = $this.data('field');
            var originalText = $this.data('original-text');
            var newText = $this.text();

            if (originalText !== newText) {
                $.ajax({
                    url: '{{ route("section.updateService") }}', // URL đến route xử lý cập nhật
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        field: field,
                        value: newText
                    },
                    success: function(response) {
                        if (response.success) {
                            showNotification('success', 'Content updated successfully');
                        } else {
                            showNotification('danger', 'Failed to update content');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Lỗi AJAX: ' + status + error);
                        showNotification('danger', 'Failed to update content');
                    }
                });
            }
        });

        function showNotification(type, message) {
            var $notification = $('#notification');
            $notification.removeClass('alert-success alert-danger').addClass('alert-' + type).text(message).fadeIn();
            setTimeout(function() {
                $notification.fadeOut();
            }, 3000);
        }

        $('.file-input').change(function() {
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
                formData.append('image', input.files[0]);
                formData.append('id', sectionId);
                formData.append('field', field);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: '{{ route("update.image") }}',
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
    });
</script>
