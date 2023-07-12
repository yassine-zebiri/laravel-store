<div class="p-3 bg-white rounded"> 
    <form action="/admin/ui-store/tools-slider/edit/serach" id="search-form">
        @csrf
        <label class="form-label" for="keyword">ادخل اسم لاضافة</label>
        <input class="form-control form-control-lg" id="keyword" name="keyword" type="text">
    </form>
    <div class="w-100" id="search-results">
       
    </div>
</div>


<script>
    var keywordInput = document.getElementById('keyword');
    var searchResults = document.getElementById('search-results');

    keywordInput.addEventListener('keyup', function() {
        var keyword = this.value;
        if (keyword !== '') {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        searchResults.innerHTML = xhr.responseText;
                    } else {
                        searchResults.innerHTML = 'Error';
                    }
                }
            };
            xhr.open('GET', '/admin/ui-store/tools-slider/edit/serach?id={{$slider->id}}&keyword=' + keyword, true);
            xhr.send();
        } else {
            searchResults.innerHTML = '';
        }
    });
</script>