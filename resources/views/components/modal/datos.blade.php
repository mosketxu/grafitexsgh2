@props(['id' => null, 'maxWidth' => '2000px'])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-2">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-2 text-right border border-t">
        {{ $footer }}
    </div>
</x-modal>
