
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import UpdatePizzaOrderForm from "../Profile/Partials/updatePizzaOrderForm";


export default function Edit({auth,pizza}){
    return(
<Authenticated user={auth.user} header={<h2 className="font-semibold text-xl text-grey-800 leading-tight">Order #{pizza.id}</h2>}>

 <Head title={'Order #'+pizza.id}/>
 <div className="py-12">
    <div className="max-w-7xl mx-auto sm:px-8 space-y-6">
        <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <UpdatePizzaOrderForm pizza={pizza} className="max-w-lg"/>
        </div>
    </div>
 </div>

        </Authenticated>
    )
}