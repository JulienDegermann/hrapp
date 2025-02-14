<a href="{{ route('job_show', $job->id) }}" class="job-card">
    <h3 class="title">{{ $job->title }}</h3>
    <img src="{{ $job->picture ? asset('uploads/images/'. $job->picture) : asset('images/default-job.webp')}}" alt="image de l'annonce">
</a>