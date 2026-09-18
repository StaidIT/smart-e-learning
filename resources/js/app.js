import './bootstrap';

import { createApp, ref } from 'vue';

// ADMIN

import Dashboard_Cards from './Vue/Admin/Pages/Dashboard_Cards.vue';
import Overview from './Vue/Admin/Pages/Overview.vue';
import Users from './Vue/Admin/Pages/Users.vue';
import Navigation from './Vue/Admin/components/Navigation.vue';
import Bottom_Navigation from './Vue/Admin/components/Bottom_Navigation.vue';
import Subjects_Navigation from './Vue/Admin/components/Subjects_Navigation.vue';
import Feedbacks from './Vue/Admin/Pages/Feedbacks.vue';
import Modules_Main from './Vue/Admin/Pages/Main/Modules_Main.vue';
import Questions_Main from './Vue/Admin/Pages/Main/Questions_Main.vue';


// CLIENT

import Subjects_Cards from './Vue/Client/Components/Subjects_Cards.vue';
import Modules_Topics_Navigation from './Vue/Client/Components/Modules_Topics_Navigation.vue';
import Pretest_Form from './Vue/Client/Pages/Pretest_Form.vue';
import Client_Navigation from './Vue/Client/Components/Client_Navigation.vue';
import Pretest_Modules from './Vue/Client/Pages/Pretest_Modules.vue';
import Choose_Pretest_Topic_Header from './Vue/Client/Components/Choose_Pretest_Topic_Header.vue';
import Taking_Pretest_Header from './Vue/Client/Components/Taking_Pretest_Header.vue';
import Pretest_Result from './Vue/Client/Pages/Pretest_Result.vue';
import User_Menu from './Vue/Client/Components/User_Menu.vue';
import Compiler from './Vue/Client/Pages/Compiler.vue';
import Pretest_Compiler from './Vue/Client/Pages/Pretest_Compiler.vue';
import Learn_Header from './Vue/Client/Components/Learn_Header.vue';


// AUTH

import Mobile_Login from './Vue/Auth/Mobile_Login.vue';
import Desktop_Login from './Vue/Auth/Desktop_Login.vue';

// GLOBAL

import Loading_Screen from './Vue/Global/Loading_Screen.vue';

const app = createApp({
    setup() {
        const subjects = ref(window.initialSubjects || []);

        function handleSubjectAdded(newSubject) {
            if (!newSubject) return;

            const exists = subjects.value.some(
                subject => String(subject.id) === String(newSubject.id)
            );

            if (!exists) {
                subjects.value.push(newSubject);
            }
        }

        return {
            subjects,
            handleSubjectAdded
        };
    }
});

// ADMIN

app.component('dashboard-cards', Dashboard_Cards);
app.component('overview', Overview);
app.component('users-page', Users);
app.component('navigation', Navigation);
app.component('bottom-navigation', Bottom_Navigation);
app.component('subjects-navigation', Subjects_Navigation);
app.component('feedbacks-page', Feedbacks);
app.component('modules-main', Modules_Main);
app.component('questions-main', Questions_Main);

// ADMIN - TOAST

// CLIENT

app.component('subjects-card', Subjects_Cards);
app.component('modules-topics-navigation', Modules_Topics_Navigation);
app.component('pretest-form', Pretest_Form);
app.component('client-navigation', Client_Navigation);
app.component('pretest-modules', Pretest_Modules);
app.component('choose-topic-header-pretest', Choose_Pretest_Topic_Header);
app.component('taking-pretest-header', Taking_Pretest_Header);
app.component('pretest-result', Pretest_Result);
app.component('user-menu', User_Menu);
app.component('compiler', Compiler);
app.component('pretest-compiler', Pretest_Compiler)
app.component('learn-header', Learn_Header)

// AUTH

app.component('mobile-login', Mobile_Login);
app.component('desktop-login', Desktop_Login);

// GLOBAL

app.component('loading-screen', Loading_Screen);

app.mount('#app');