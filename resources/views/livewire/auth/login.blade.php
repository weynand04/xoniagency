<form wire:submit.prevent="login" class="space-y-4 max-w-md mx-auto mt-10">
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" wire:model.defer="email" class="w-full border rounded p-2">
        @error('email')
            <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" wire:model.defer="password" class="w-full border rounded p-2">
        @error('password')
            <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center">
        <input type="checkbox" wire:model="remember" id="remember" class="mr-2">
        <label for="remember">Remember Me</label>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Login</button>
</form>
