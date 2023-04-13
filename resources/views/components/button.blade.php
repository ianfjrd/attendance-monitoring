<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#8EC33F] border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#8EC33F] focus:bg-[#8EC33F] active:bg-[#8EC33F] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>


