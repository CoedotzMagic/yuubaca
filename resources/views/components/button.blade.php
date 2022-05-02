<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest  focus:outline-none  focus:ring  disabled:opacity-25 transition ease-in-out duration-150', 'style' => 'background-color: #00a3ff']) }}>
    {{ $slot }}
</button>
