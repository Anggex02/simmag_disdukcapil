@props([
'id'=>'modal'
])

<div
id="{{ $id }}"
class="fixed inset-0 hidden bg-black/60 z-50 justify-center items-center">

<div class="bg-card rounded-2xl w-full max-w-lg shadow-card">

<div class="border-b border-bordercolor px-6 py-4">

<h2 class="text-xl font-semibold">

{{ $title ?? 'Modal' }}

</h2>

</div>

<div class="p-6">

{{ $slot }}

</div>

<div class="border-t border-bordercolor p-4 flex justify-end gap-3">

<button
onclick="document.getElementById('{{ $id }}').classList.add('hidden')"
class="bg-gray-600 hover:bg-gray-700 px-5 py-2 rounded-xl">

Tutup

</button>

</div>

</div>

</div>