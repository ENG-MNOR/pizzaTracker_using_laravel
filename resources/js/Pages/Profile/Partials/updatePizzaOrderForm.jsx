import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import { Transition } from "@headlessui/react";
import { useForm } from "@inertiajs/react";

const UpdatePizzaOrderForm = ({ pizza, className = '' }) => {
    const { data, setData, patch, recentlySuccessful, errors, processing } = useForm({
        size: pizza.size,
        crust: pizza.crust,
        toppings: pizza.toppings.join(",")
    });

    const submit = (e) => {
        e.preventDefault();
        patch(route('update', pizza.id),{
            preserveScroll:true,
        });
    }

    return (
        <section className={className}>
            <header>
                <h1 className="text-lg font-medium text-gray-900">Order Information</h1>
                <p className="mt-1 text-sm text-gray-600">Update your order information</p>
            </header>
            <form onSubmit={submit} className="mt-6 space-y-6">
                <div>
                    <InputLabel htmlFor="size" value="Size" />
                    <TextInput
                        id="size"
                        name="size"
                        className="mt-1 block w-full"
                        value={data.size}
                        onChange={(e) => setData('size', e.target.value)}
                    />
                </div>
                <div>
                    <InputLabel htmlFor="crust" value="Crust" />
                    <TextInput
                        id="crust"
                        name="crust"
                        className="mt-1 block w-full"
                        value={data.crust}
                        onChange={(e) => setData('crust', e.target.value)}
                    />
                </div>
                <div>
                    <InputLabel htmlFor="toppings" value="Toppings" />
                    <TextInput
                        id="toppings"
                        name="toppings"
                        className="mt-1 block w-full"
                        value={data.toppings}
                        onChange={(e) => setData('toppings', e.target.value)}
                    />
                    {/* <InputError message={errors}/> */}
                </div>
                <div className="flex items-center gap-4">
                    <PrimaryButton disabled={processing}>Save Changes</PrimaryButton>
                    <Transition
                        show={recentlySuccessful}
                        enter="transition ease-in-out"
                        enterFrom="opacity-0"
                        leave="transition ease-in-out"
                        leaveTo="opacity-0"
                    >
                        <p className="text-sm text-gray-600">Saved.</p>
                    </Transition>
                </div>
            </form>
        </section>
    );
}

export default UpdatePizzaOrderForm;
