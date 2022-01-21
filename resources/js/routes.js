import AllComments from "./components/AllComments";
import LeaveAComment from "./components/LeaveAComment";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllComments
    },
    {
        name: 'create',
        path: '/create',
        component: LeaveAComment
    }
];
