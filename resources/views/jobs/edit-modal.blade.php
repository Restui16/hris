@foreach($jobs as $job)
<!-- Modal -->
<div class="modal fade" id="editJob{{ $job->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit job</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('update_job', $job->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="modal-body">
                    <input type="text" id="job_title" name="job_title"
                        class="form-control @error('job_title') is-invalid @enderror"
                        value="{{ old('job_title', $job->job_title) }}">

                    @error('job_title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <textarea name="job_desc" id="job_desc" cols="30"
                        class="form-control mt-3 @error('job_desc') is-invalid @enderror"
                        placeholder="Job Description">{{ old('job_desc', $job->job_desc)}}</textarea>

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
@endforeach