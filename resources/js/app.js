import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import Clipboard from '@ryangjchandler/alpine-clipboard';
import 'flowbite';
 
Alpine.plugin(Clipboard)
 
Livewire.start()