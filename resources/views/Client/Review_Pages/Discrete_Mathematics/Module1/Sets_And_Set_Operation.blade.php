<div class="mt-10" id="topic-sets-and-set-operation">

    <h2 class="text-2xl font-bold">
        2. Sets and Set Operation
    </h2>

    <div class="w-full h-[1px] flex items-center justify-center pt-[10px]">
        <div class="bg-gray-600 w-full h-[1px]"></div>
    </div>

    <p class="text-md text-gray-400 px-3 mt-4 leading-relaxed">
        A set is a well-defined collection of distinct objects. The
        objects contained in a set are called elements or members.
    </p>

    <h3 class="text-xl font-bold mt-6">
        Example of a Set
    </h3>

    <div class="bg-[#1B0D2D] border border-[#3A2560] rounded-xl p-5 mt-4">

        <p class="text-white text-lg">
            A = {1, 2, 3, 4, 5}
        </p>

        <p class="text-gray-400 mt-3">
            The set A contains five elements: 1, 2, 3, 4, and 5.
        </p>

    </div>


    <h3 class="text-xl font-bold mt-6">
        Common Types of Sets
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

        <div class="bg-[#1B0D2D] border border-[#3A2560] rounded-xl p-5">
            <h4 class="font-bold text-lg">
                Empty Set
            </h4>

            <p class="text-gray-400 mt-2">
                A set containing no elements.
            </p>

            <p class="text-white mt-2">
                ∅
            </p>
        </div>


        <div class="bg-[#1B0D2D] border border-[#3A2560] rounded-xl p-5">
            <h4 class="font-bold text-lg">
                Finite Set
            </h4>

            <p class="text-gray-400 mt-2">
                A set containing a limited number of elements.
            </p>

            <p class="text-white mt-2">
                A = {1, 2, 3}
            </p>
        </div>


        <div class="bg-[#1B0D2D] border border-[#3A2560] rounded-xl p-5">
            <h4 class="font-bold text-lg">
                Infinite Set
            </h4>

            <p class="text-gray-400 mt-2">
                A set containing an unlimited number of elements.
            </p>

            <p class="text-white mt-2">
                N = {1, 2, 3, 4, ...}
            </p>
        </div>


        <div class="bg-[#1B0D2D] border border-[#3A2560] rounded-xl p-5">
            <h4 class="font-bold text-lg">
                Universal Set
            </h4>

            <p class="text-gray-400 mt-2">
                The set containing all elements being considered.
            </p>
        </div>

    </div>


    <h3 class="text-xl font-bold mt-6">
        Set Operations
    </h3>

    <p class="text-md text-gray-400 px-3 mt-3 leading-relaxed">
        Set operations are used to combine, compare, and manipulate
        different sets.
    </p>

    <div class="overflow-x-auto mt-4">

        <table class="w-full border-collapse">

            <thead>
                <tr class="bg-[#24123B]">

                    <th class="border border-[#3A2560] p-3 text-left">
                        Operation
                    </th>

                    <th class="border border-[#3A2560] p-3 text-left">
                        Symbol
                    </th>

                    <th class="border border-[#3A2560] p-3 text-left">
                        Description
                    </th>

                </tr>
            </thead>

            <tbody class="text-gray-400">

                <tr>
                    <td class="border border-[#3A2560] p-3">
                        Union
                    </td>

                    <td class="border border-[#3A2560] p-3 text-white">
                        A ∪ B
                    </td>

                    <td class="border border-[#3A2560] p-3">
                        Contains all elements from A and B.
                    </td>
                </tr>

                <tr>
                    <td class="border border-[#3A2560] p-3">
                        Intersection
                    </td>

                    <td class="border border-[#3A2560] p-3 text-white">
                        A ∩ B
                    </td>

                    <td class="border border-[#3A2560] p-3">
                        Contains elements common to both sets.
                    </td>
                </tr>

                <tr>
                    <td class="border border-[#3A2560] p-3">
                        Difference
                    </td>

                    <td class="border border-[#3A2560] p-3 text-white">
                        A − B
                    </td>

                    <td class="border border-[#3A2560] p-3">
                        Contains elements in A that are not in B.
                    </td>
                </tr>

                <tr>
                    <td class="border border-[#3A2560] p-3">
                        Complement
                    </td>

                    <td class="border border-[#3A2560] p-3 text-white">
                        A′
                    </td>

                    <td class="border border-[#3A2560] p-3">
                        Contains elements not included in A.
                    </td>
                </tr>

            </tbody>

        </table>

    </div>


    <h3 class="text-xl font-bold mt-6">
        Example
    </h3>

    <div class="bg-[#1B0D2D] border border-[#3A2560] rounded-xl p-5 mt-4">

        <p class="text-white">
            A = {1, 2, 3, 4}
        </p>

        <p class="text-white mt-2">
            B = {3, 4, 5, 6}
        </p>

        <div class="mt-4 space-y-2 text-gray-400">

            <p>
                Union:
                <span class="text-white">
                    A ∪ B = {1, 2, 3, 4, 5, 6}
                </span>
            </p>

            <p>
                Intersection:
                <span class="text-white">
                    A ∩ B = {3, 4}
                </span>
            </p>

            <p>
                Difference:
                <span class="text-white">
                    A − B = {1, 2}
                </span>
            </p>

        </div>

    </div>

</div>
