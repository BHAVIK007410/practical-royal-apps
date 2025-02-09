import 'jquery';
import 'jquery-validation';

import axios from 'axios';

// Set axios as a global variable
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
