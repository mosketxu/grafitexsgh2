<div
    wire:ignore
    x-data
    x-init="
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.setOptions({
            allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes['wire:model'] }}',file,load,error, progress)
                },
                revert: (filename, load) => {
                    const image = new Image();
                    image.src = URL.createObjectURL(file);
                    @this.removeUpload('{{ $attributes['wire:model'] }}',filename,load)
                },
            },
        });
        FilePond.create($refs.input);
        {{-- var Pond = FilePond.create($refs.input);
        this.addEventListener('FilePond:processfile', e => {
            setTimeout(function(){
                Pond.removeFile(e.detail.file.id);
            }, 1000);
        }); --}}

    "
>

    <input type="file" x-ref="input" accept="image/*"/>

</div>




