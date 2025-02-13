<div class="job">
    <h2 class="title">{{ $current->title }}</h2>
    <img src="{{ asset(isset($current->picture) ? 'uploads/images/' . $current->picture : 'images/default-job.webp') }}" alt="{{ isset($current->picture) ? 'image du job': 'image de job par défaut' }}">
    <p>Publiée le : {{ $current->published_at }}</p>
    <p>Commencement prévu : {{ $current->start_date }}</p>
    <a href="{{ route('admin.show_jobs', ['id' => $current->id]) }}" class="button">modifier</a>
    <form action="{{ route('admin.delete_job', ['id' => $current->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="suppimer" class="button">
    </form>

</div>