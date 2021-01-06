<x-app-layout>
    <x-slot name="title">Aghh! I mean, hello.</x-slot>

    <x-slot name="slot">
        <div class="col-3">
            <div>
                <img src="{{ asset('build/images/bigfoot.png') }}" class="big-foot-img" alt="sasquatch">
            </div>
        </div>

        <div class="col">
            <h1>About Us</h1>
            <p>
                We are definitely real "humans" and not sasquatch hiding in plain site.
                We enjoy doing many popular human things, such as "showering under
                warm water" and "moving a brush on top of our teeth".
                We definitely do not enjoy hiding from other humans nor hunting
                with our bare claws, I mean, hands.
            </p>
        </div>
    </x-slot>
</x-app-layout>
