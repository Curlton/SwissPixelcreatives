<div> <!-- Critical Root Element -->
    <div class="card">
        <h2>Admin Login</h2>
        <form wire:submit.prevent="login">
            <div class="form-group">
                <label>Admin Email</label>
                <input type="email" wire:model="email">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" wire:model="password">
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>

            <button type="submit">Admin Login</button>
        </form>
    </div>
</div>