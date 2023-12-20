@csrf

@if ($project->image)
    <img style="height: 200px; object-fit: cover;" class="mx-auto w-100 mb-2" src="/storage/{{ $project->image }}" alt="{{ $project->title }}">
@endif

<div class="form-group">
    <div class="mb-3">
        <label for="formFile" class="form-label">Archivo</label>
        <input name="image" class="form-control" type="file" id="formFile">
    </div>
    <div class="form-group">
        <label for="category_id">Categoría del Proyecto</label>
        <select
            name="category_id"
            id="category_id"
            class="form-control border-0 bg-light shadow-sm"
        >
            <option value="" >Seleccione</option>
            @foreach ($categories as $id => $name )  // {id,name} = category
                <option
                    value={{ $id }}
                    {{-- {{ $id == $project->category_id ? 'selected':'' }} --}}
                    @if($id == old('category_id',$project->category_id)) selected @endif
                >
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </div>
    <label for="title">Titulo del proyecto</label>
    <input class="form-control border-0 bg-light shadow-sm" id="title" name="title" type="text"
        value="{{ old('title', $project->title) }}" />
</div>
<div class="form-group">
    <label for="url">Url del proyecto</label>
    <input class="form-control border-0 bg-light shadow-sm" id="url" name="url" type="text"
        value="{{ old('url', $project->url) }}" />
</div>
<div class="form-group">
    <label for="description">Descripción del proyecto</label>
    <input class="form-control border-0 bg-light shadow-sm" id="description" name="description" type="text"
        value="{{ old('description', $project->description) }}" />
    <br>
    <div class="d-grid gap-2">
        <button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
    </div>
    <a href="{{ route('project.index') }}" class="btn btn-light btn-lg btn-block">Regresar</a>
</div>
<br>
