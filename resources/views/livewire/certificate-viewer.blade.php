<div>
    <div class="certificate-wrapper">
    <!-- Trigger Card -->
    <div class="bg-slate-800 border border-slate-700 p-5 rounded-2xl cursor-pointer hover:bg-slate-750 transition-all" 
         wire:click="toggleView">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-500/10 rounded-xl flex items-center justify-center text-amber-500">
                <i class="ri-file-pdf-2-line text-2xl"></i>
            </div>
            <div>
                <h5 class="text-white font-bold mb-0">View Official Certificate</h5>
                <p class="text-slate-400 text-xs mb-0">PDF Secure Protected View</p>
            </div>
        </div>
    </div>

    <!-- Protected PDF Viewer Modal -->
    @if($showViewer)
    <div class="fixed inset-0 z- flex items-center justify-center p-4 backdrop-blur-xl bg-slate-950/90 anim-fade-in">
        <div class="relative w-full max-w-5xl h-[90vh] bg-slate-900 rounded-2xl shadow-2xl overflow-hidden flex flex-col">
            
            <!-- Secure Header -->
            <div class="p-4 flex justify-between items-center border-b border-white/10">
                <span class="text-white font-medium text-sm tracking-widest">
                    <i class="ri-lock-line text-amber-500 mr-2"></i>PROTECTED PDF VIEW
                </span>
                <button wire:click="toggleView" class="w-8 h-8 rounded-full bg-white/10 text-white hover:bg-red-500 flex items-center justify-center transition-colors">
                    <i class="ri-close-line"></i>
                </button>
            </div>

            <!-- PDF Content Area -->
            <div class="flex-grow bg-slate-800 relative">
                <!-- Watermark Layer (Prevents easy screen captures) -->
                <div class="absolute inset-0 pointer-events-none z-10 flex items-center justify-center opacity-[0.03] select-none">
                    <h2 class="text-9xl font-black rotate-[-30deg] text-white">CONFIDENTIAL</h2>
                </div>

                <!-- PDF Embed -->
                <iframe 
                    src="{{ $certificateUrl }}#toolbar=0&navpanes=0&scrollbar=0" 
                    class="w-full h-full border-none relative z-20"
                    title="Certificate Viewer"
                    loading="lazy">
                </iframe>
            </div>

            <!-- Footer Warning -->
            <div class="p-3 bg-slate-950 text-center">
                <p class="text-[10px] text-slate-500 uppercase tracking-widest">
                    Unauthorized copying or distribution of this document is strictly prohibited.
                </p>
            </div>
        </div>
    </div>
    @endif
</div>

</div>
