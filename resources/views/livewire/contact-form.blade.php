<div>
    <form wire:submit.prevent="submit" class="wpcf7-form">
    <p>
        <label>
            <span class="wpcf7-form-control-wrap">
                <input type="text" wire:model="name" class="wpcf7-form-control wpcf7-text" placeholder="Your Name">
            </span>
            @error('name') <span style="color:red">{{ $message }}</span> @enderror
        </label><br />

        <label>
            <span class="wpcf7-form-control-wrap">
                <input type="text" wire:model="company" class="wpcf7-form-control wpcf7-text" placeholder="Company Name">
            </span>
        </label><br />

        <label>
            <span class="wpcf7-form-control-wrap">
                <input type="tel" wire:model="phone" class="wpcf7-form-control wpcf7-tel phone_form" placeholder="Phone Number">
            </span>
        </label><br />

        <label>
            <span class="wpcf7-form-control-wrap">
                <input type="email" wire:model="email" class="wpcf7-form-control wpcf7-text" placeholder="Email">
            </span>
            @error('email') <span style="color:red">{{ $message }}</span> @enderror
        </label><br />

        <label>
            <span class="wpcf7-form-control-wrap">
                <input type="text" wire:model="country" class="wpcf7-form-control wpcf7-text" placeholder="Country">
            </span>
        </label><br />

        <label>
            <span class="wpcf7-form-control-wrap">
                <textarea wire:model="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" placeholder="What can we do for you?"></textarea>
            </span>
        </label>
    </p>

    <center>
        <p>
            <button type="submit" class="wpcf7-form-control wpcf7-submit has-spinner">
                <span wire:loading.remove>Submit</span>
                <span wire:loading>Processing...</span>
            </button>
        </p>
    </center>

    @if ($successMessage)
        <div class="wpcf7-response-output" style="display:block; border: 2px solid green; padding: 10px;">
            {{ $successMessage }}
        </div>
    @endif
</form>


</div>
