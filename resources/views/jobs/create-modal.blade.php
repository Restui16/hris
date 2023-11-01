<div class="modal fade" id="createJob" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Creat Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('store_job') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text" id="job_title" name="job_title"
                        class="form-control  @error('job_title') is-invalid @enderror" value="{{ old('job_title')}}"
                        placeholder="Job Name">

                    @error('job_title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <textarea name="job_desc" id="job_desc" cols="30"
                        class="form-control mt-3 @error('job_desc') is-invalid @enderror"
                        placeholder="Job Description">{{ old('job_desc')}}</textarea>

                    @error('job_desc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>