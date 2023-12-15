@csrf
<div class="form-group">
    <label for="title">Titulo del proyecto</label>
    <input class="form-control border-0 bg-light shadow-sm" id="title" name="title" type="text"
        value="{{ old('title', $project->title) }}" />
</div>
<br>
<div class="form-group">
    <label for="url">Url del proyecto</label>
    <input class="form-control border-0 bg-light shadow-sm" id="url" name="url" type="text"
        value="{{ old('url', $project->url) }}" />
</div>
<br>
<div class="form-group">
    <label for="description">Descripción del proyecto</label>
    <input class="form-control border-0 bg-light shadow-sm" id="description" name="description" type="text"
        value="{{ old('description', $project->description) }}" />
    <br>
    <div class="d-grid gap-2">
        <button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
    </div>
    <br>
    <a href="{{ route('project.index') }}" class="btn btn-light btn-lg btn-block">Regresar</a>
</div>
<br>
