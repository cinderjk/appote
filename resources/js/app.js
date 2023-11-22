import Clipboard from '@ryangjchandler/alpine-clipboard';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import 'flowbite';
import Choices from 'choices.js';
 
window.Choices = Choices;
Alpine.plugin(Clipboard);
Livewire.start()