{{-- <h1>cours{{ $id }}</h1>
<h1>{{ Auth::guard('stagiaire')->user()->id }}</h1> --}}
@extends('stagiaire.leftmenu')
@section('content')

<div class=" mt-20 mb-4 ml-4"> <span class="text-2xl  bg-gray-700 text-white font-semibold py-2 px-4 rounded-3xl">Les cours du module </span></div>

<div class=" flex container mx-auto justify-center bg-gray-700   rounded-3xl">

    <div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold text-white p-5">Vous devait partager ici les document concernant le cour oubien un URL pour acceder au document </h1>

        <form action="{{ route("stagiaires.addfiletache") }}" method="post" enctype="multipart/form-data" id="form" >
            @csrf
            <input type="hidden" name="cour_id" id="cour_id" value="{{ $id }}">
            <input type="hidden" name="stagiaire_id" id="stagiaire_id" value="{{ Auth::guard('stagiaire')->user()->id }}">
            <div class="mb-6">
                <label for="url" class="block text-white text-sm font-bold mb-2">Description</label>
                <textarea type="text" id="tacheDescription" name="tacheDescription" class="text-gray-700 w-full px-4 py-2 border border-gray-300 rounded  focus:ring focus:border-blue-500"></textarea>
                </div>
           <div class="mb-6">
            <label for="url" class="block text-white text-sm font-bold mb-2">url</label>
            <input type="text" id="url" name="tacheURL" class="text-gray-700 w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500">

           </div>

           <div class=" mb-6">
            <label for="url" class="block text-white text-sm font-bold mb-2">file (on peut ajouter plusieur fichiers en meme temp )</label>
            {{-- <input type="file" id="file" name="tachefile" class="filepond" multiple credits="false"> --}}
            <input type="file" name="fichier[]" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png" multiple  id="upload" class="file-input p-5 text-white  border border-gray-300 rounded" style="">

            {{-- <input type="file" id="" name="tachefile" class="text-gray-700 w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500" multiple credits="false"> --}}
           </div>
           <div class="mb-6">
             <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500">ajouter</button>

           </div>
        </form>


     </div>
      </div>


{{-- <script type="text/javascript">
new Dropzone("#from",{
    thumbnailWidth:100,
    maxFilesize:30,
    acceptedFiles:".jpg,.jpeg,.png,.pdf,.docx",
    dictDefaultMessage:"Faites glisser et déposez des fichiers ici ou cliquez pour sélectionner des fichiers",
    addRemoveLinks:true,
})
document.getElementById("submit-button").addEventListener("click", function () {
            document.getElementById("my-dropzone").dropzone.processQueue();
        });
</script> --}}
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script type="text/javascript">
    // Get a reference to the file input element
    FilePond.registerPlugin(FilePondPluginImagePreview);
    const inputElement = document.querySelector('input[id="file"]');



    FilePond.create(inputElement, {
    allowMultiple: true, // Autorise l'envoi de plusieurs fichiers
    // Autres options de configuration (facultatives)
});


FilePond.setOptions({
    server:{
        process:'{{ route("stagiaires.temporariyimage") }}',
        revert:'{{ route("stagiaires.removetemporariyimage") }}',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }


})
</script>

@endsection

