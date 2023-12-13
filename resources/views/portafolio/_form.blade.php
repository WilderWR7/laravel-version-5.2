@csrf
<label>
    Titulo del proyecto <br>
    <input name='title' type="text" placeholder="Nombre" value="{{@old("title",$project->title)}}" />
</label>
<br>

<label>
    URL del proyecto<br>
    <input name='url' type="text" placeholder="URL..." value="{{@old("url",$project->url)}}"/>
</label>

<br>
<label>
    Descripcion del proyecto <br>
    <input name='description' type="text" placeholder="Description" value="{{@old("description",$project->description)}}" />
    <br>
</label>
<br>