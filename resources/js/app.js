import './bootstrap';

import { createApp } from 'vue';

// ADMIN
import Dashboard_Cards from './Vue/Admin/Pages/Dashboard_Cards.vue';
import Overview from './Vue/Admin/Pages/Overview.vue';
import Users from './Vue/Admin/Pages/Users.vue';
import Navigation from './Vue/Admin/components/Navigation.vue';
import Bottom_Navigation from './Vue/Admin/components/Bottom_Navigation.vue';
import Subjects_Navigation from './Vue/Admin/components/Subjects_Navigation.vue';
import Feedbacks from './Vue/Admin/Pages/Feedbacks.vue';
import Topics_Main from './Vue/Admin/Pages/Main/Topics_Main.vue';
import Questions_Main from './Vue/Admin/Pages/Main/Questions_Main.vue';

//ADMIN - MODALS
import Add_Subject from './Vue/Admin/Modal/Add_Subject.vue';
// ADMIN - TOAST

// CLIENT
import Subjects_card from './Vue/Client/Components/CARD_Subjects.vue';
import NAV_Topics from './Vue/components/NAV_Topics.vue';

const app = createApp({});

// ADMIN
app.component('dashboard-cards', Dashboard_Cards);
app.component('overview', Overview);
app.component('users-page', Users);
app.component('navigation', Navigation);
app.component('bottom-navigation', Bottom_Navigation);
app.component('subjects-navigation', Subjects_Navigation);
app.component('feedbacks-page', Feedbacks);
app.component('topics-main', Topics_Main);
app.component('questions-main', Questions_Main);

// ADMIN - MODAL
app.component('add-subject', Add_Subject);
// ADMIN - TOAST

// CLIENT
app.component('subjects-card', Subjects_card);
app.component('nav-topics', NAV_Topics);


app.mount('#app');
