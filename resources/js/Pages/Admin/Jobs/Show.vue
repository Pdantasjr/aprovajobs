<template>
    <Head :title="job.title"/>
    <AppLayout>
        <MainContent>
            <div class="flex items-center w-11/12 lg:w-full max-w-4xl h-auto mx-auto">
                <Link :href="route('admin.jobs.dashboard')">
                    <AppIcons name="return"/>
                </Link>
                <AppTitle :title="job.title"/>
            </div>
            <div class="flex justify-center flex-col w-11/12 lg:w-full max-w-4xl h-auto mt-6 mx-auto">
                <AppAccordion :description="job.description" :category="job.job_category.name" :deadline="job.deadline" />
            </div>
            <div class="flex justify-center flex-col w-11/12 lg:w-full max-w-4xl h-auto mt-6 mx-auto">
                <h1 class="text-light font-semibold">Status</h1>
                <AppSingleStatus />
            </div>
            <div class="flex justify-center flex-col w-11/12 lg:w-full max-w-4xl h-auto mt-6 mx-auto">
                <div class="flex">
                    <div class="flex-1">
                        <img class="w-full h-auto rounded-lg shadow-lg" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMSEhUSEhIWFRUWFxcXFxUYFxcVFxYXFhoWFxYXGBUYHSggGBolGxcbITEhJSktLi4uFx8zODMsNygtLisBCgoKDg0OGhAQGy0lICUtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAOEA4QMBIgACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAAAAQIEBQYDB//EAEQQAAEDAQUEBwYFAgQEBwAAAAEAAhEDBAUSITEGQVGREyIyYXGB0RRCobHB8AcjUnLhM2IVgpKyQ1PC8SQ0RGNzk6L/xAAaAQACAwEBAAAAAAAAAAAAAAAAAwECBAUG/8QAMhEAAgEDAQUGBQQDAQAAAAAAAAECAxEhMQQSQWFxEzJRodHwFCIzgZEFUrHBFeHxYv/aAAwDAQACEQMRAD8AuPRHNIl5LmnuQ/lKhNQAvNH8pUiABHNInIAEiRCCbDk1KkQCFS89U1KggROTUIJHc9U1OTUAhUqahAWBCEIAcmpUiAQ5CEiCBE5NTkEsT70SpPvVKggEn3oj0RzQAsoSfylQAIRz1Rz3oAEIS89UANSJyEAW13WGm+zVqhnHTmNzY3Zb9/wXa02Czusz61JtRpa4N68daS2dJkZ8wnXJg9mrtdUY1z5Aa5wDuqJ075hd9qXBzR0demabQAKTHA5ic4buA5JqS3b8jmuc3X3bvvc7WtG653d7cFl3OlK5aBptyfjNDpZnKYG7xKh7QWGz0QGsa/pCGuDplkEkEHPXLgrelaaYptea1PKzYC3GMWIhp08ohQtqawexuCvTc0Yeo0tc7H1gXCM4gq0kt1tCaM6rrRUm7Xet7clpppjTmRrpu6hVou6rxVawuJOTSTiwwJz0Vg/Z2iHPEOgCnHW/USHfILvUtdLo3vFanJswYG4hixAOPZ194KVaLbR6zumpnFgAAe0nI8PNWUY2zb3cTUr13LejvJN6Zw/lv/f2uiFW2aotzh2dRgHW912EEc55rgy4KMgEOzrPZr7rWvcP9ozVrXvOi7LpWdWqz325iWukZ5jPXuK4/wCKUyW4qzMq746zcmYKgafDMZ96lqF+BSFbatx3bvnx/bgor9uyiyiKlMOH5jmEOM9jG0nmz4qgWn2jrM6BrG1WPd0z39RwdAe6o4TGnaAWaSJ2vg7Gxyk6fzNvLtfW18eQ40HYcUZJhadYy8FY2Z4c0eEFcrbVEYR59yrbBaNWTlu2ISE5IoNFxEJyEBcalQlQQJyQllCABCEn3ogBU+jRLtIyTFLu7U+A+qtFXdhdWTjBtDfYXf28z6JPYHf28z6KxQm9nEw/FT5Fd7A7+3mfRHsDu7mfRWKEdnEPianIrvYD3cz6I9gPdzPorAFKhQiyXtNRa2K72B3dzPoj2B3dzPorFCOziR8VUK72B3dzPoj2B3dzPorFCOziHxVQrvYHd3M+iPYHd3M+isCVSX1fFPAW07Sxj5iQQ7C4ZwQEdnEn4mpyJJspmJbPCc/kmuoQQ0uaCdBOZ8BC88vHaR1WpifGJghsaBw1cCcxP1hbTZm2ttdDpAQKwJD9+Fzcm9UnQtjmd6hwigjtcpOyfkWXsTu7mfRNp2XEJa5pB0IJ9El93s2g2IxvIypg5kHInwVDsjeLOqCSCGQWzIAHZJ4ZZeRUqCZL2iemPwaNtieNCB5n0SewO7uZ9FMoWhrxLSCAYMbjwXVT2cSvxNTl+Cu9gPdzPoj2B3Ecz6KxQjs4h8VPkV3sDu7mfRcKjC0wd3erhVVs7Z+9wVJxSWB2z1pTk0/A5JU1LySjYKhJyQgA9EvPVCEAJ/KmXdqfAfVRFLu3U+AV4d5CNo+mychCFoOWCQhKhQ1clNrQQBKhCErA22CEIUgCRzgMzkhY78Rr6fQYymyAKk4nEA5CAGjzM+SCG7ZI2120oLTTpPBG8N1iDMleb2i14jI893kn3haS8lznYiVXUqkEg5SiKvkxV613ZHanUJcc/v1Vjd16VaD8dJ7qb8gY94f3NORHiq2mGzJ8P4TqtQwBl4K1r4EqTWbltet9V6r31XvgujsmAABAA1gd3eVwsdse0EMcRi1gweIE8JUMZR46eCV9ownDMT8j8ioaL9q3ls9F2RvaqG06TnCarjgJgudhye4nXukrf0mkCCZ714jc1uNOo0ul0RALy2GtkgYh2WyQTxjyW/u3a0P0lz4gNyY3ESIEOdn47uarc305b0TYoSApVJYFWW3tn73BWaq7Z2j97gl1NDTsnffT0OSEISDoifeiVCEACT70RzTueqAEUq7tT4BRee9WNCkG6GZ3q0dRNdrct4khCQJVpOWCEIQQCp732joWcHE6XD3RnzO5RdpbXWcx7LOOqz+tUBGJoiSxg1xQQSdwOWemNu6wVrQ8htPCwZYjqf28FSU7FZyawkcL923rVak03YKe4DU+JVldW0VUsxU6wdGrT1uYJ+oV7ZdjaGGKjA496LXsFQjFTLqbtzmn5jeErtEK+e97hdm3FF8trA0ngTl1mO/adQe4gea872xt7qtd5IIgkhszhB+u+NybtXddWhU/MH+Ydlw7uHgqO1uL4dOu/wBe9Pg75F1ar3XHiLQIzJzJy7h4BRq9njMFcpMwN6t7DdNaoIDdd5V5NRy2ZIxdTEUVlGphc081Y2dzcbweMfyrSjsq8mSMhn5qpvSyOpPKp2kZOyGOjOCu0PAzbp96rl0GMzOfHjwTOmbAzII1BTqdfcMlfJXDO4cBkTHzBXWjVfjaHuy465byB96JjLFUrOcWUnuLGhzi1rnYROroGQyPJc6h6sNzy1O4qGXjJrJ7bsneDKtBoaScHVk6kDQlXKwX4Y2tpYac4S3MCT1pEO8cwFvVVHRTukwVXbO2dPsBWirLb2z97gqVdDVsnffT0OCOSVHrwSDoickqEIAEIlHqgAUq7tT4BRVLu7U+AV4d5Cdo+mychCFoOWCiXrbW0KL6zswxswNTwA8Tkpayv4j18Nkw/reAfAAn5gKHoRe2SVS2ls9ak8tdDsDjgeMLpjTg457iUuzkCk3w+JXnl36t8Y5kj6LTWe+KlJgwsaGjLHUfGI/2tGaROIrtXN5N3TK43nedKiPzH5nRgBc4+DQsvd20zpaamHC4gYmzAJ0mcwra9bOQ/G3fAxiCWg7x3qhFiJfVAWmiW1KDmtOjiWEtO4uaDLfuYXkF7XeaWNhyczFI4gxDh3QvYLmuWo2qXtrvLXSMLhMjOJ0z0+PFUn4iXADSNVo69PPxZ7w5Z+SvCW7LGhSUN6GdTzrZiysLi+oYaCAMic16nddmZgBbBHcsdczhQpNpvpucC0vdAEcTmTr3K3uSswVR0Bdgf7pBbB17J038lSt87ci1BbiUOJrG2UELP39cLamcZqXftvq0yGUy0OjPFJ+C4WOraXCaldsboYPVUjhDJa6Hn20NzmmJA0VLQBJAHPgvTL8sxcCHAdxGh8t3gvNq9FzXEDcVpoTurMy7TTUWpI9O/CG8mtq16DnDE8New/q6MODwPIgx+5L+IF1WGzURTp0x7Q+pjBxElrSSXYs4a2Oq0dw4ErzqwW9zDjYS17S0tc3IgtMzP3MLpaLXil7nlz3nrOJlxPEzmSmbuSqqJwsaHYu00hWcyqeqQ4A6HFlBDp6uhzXsNI5DOchnx715NsFdAqV2PcJaJPaGREES0556Rnr3L1sIRtp33FcFWW3tn73BXr2A5qit8dI6PvIJU5XRs2Tvvp6HFHqhJySjoioSckIAVLz1SIQAc96l3dqfAfVRFLu7U+A+qvDvIRtH02TkIQtBywWJ/FSRRpji53+3Jbyg0a71h/xdB6Oid01OcMj6qjlmxEtGZG7m9Zvl/wDlrT9Vp7rup7nsqtaHABwwmCOtGcEiDrpxWLoWyGAjUT8m+i2my96hoEncPlCVNtaCIxTvct7yuanSszpYA6IyMndqd+gjwVjZLa1tJjnObkADJH1VXtPbjVpim12HeT8lU7NWGmXYSX2mD2A3EwE8XHIKmWMjGysbOnfNJrwHGCRLZyDh/adCo18OFSlUj9DvkVWbTvqtphr7LSIJAYx9VrXEmAMIAOfhwQ38uzPaTm1lQZ65YgM/JVaasSt3gKbLSDBiAEb0277OHVOkDcmDKZ1WYq3gXhuMhocDhne7+J+K7XZbLYAWswmfexAA+I1VdwY2aS2XS20Md1syZka/Ayqilsa7EXCo9u8w/E3/AOtwLQpdVlZtMVXENe3PCzMRvBdvlWlivxr6eZCmLaWpSSUmUd52cNbEyeK8wvKmRUeYylek3zapJhYzaKwmk3pMTdILZklx7t2undKvQdn1F7Qrx6GYFMp1OzkkADMxA8VzbWdMq92Wsxr2hjYMAgwJ3EAZgGM963NtGGjBTkkekbF7MYKVOpVGGo12Jhbk4NIiHneDw4LZrjZaGBobJMASSZJXZUOrhaC4jEblV23tn73BWarLb2z97gl1NDTsnffT0OKPXghJ6pB0RZQhCAGpyEc9UACl3dq7wCiBS7u1d4BXh3kJ2j6bJyE5jCdE0haDlAvOfxRtsuZTxGGtxRuk/wABby325tIcXHRvHvPALH3pTYanS1KQeTBxBpfHwMQEqpUSwD0Z5jRqOAJLXYQdYMCe/wA1obhtLTDXHwPyPgtqypSdHQvDXz2XNnwlrs+S7Vti6VSo6rWc4PcG5Uw2mGkCJETJ84KW5qfCwjcdNLNyBeN1+02b8t5ZUYRiG5/Cd8EfJcblr2ljeidX6FumGhSh5H73gkHwS2ytUsFTDV61N0tZU0a9uuF36XjXykbwLW7b0oPAJInfpzVVJrAz5ZZ1R3uy56eNtUMOIZl9Q9JVce97pPy8FU/iLegs9BzWnr1AWgePaPkM+SvbRtRRpNIaJPAZrxzaW9X2u0PqP0BLWjc0Ax8VeEd6WRVao1Hm8Gss1IPo4KrRipPaYInCWnf3ce6VsLpoWVzQ11l60EzTrAMnKCJe06d28rzXYS8GteaVTQgx9QvQaVx0SZa8gaxOSh/I7F4SjOO97+5HvW6Q8/8Ahar6EZOl3Sg5k6EkaZa7lBNhFMQ1x+/ory2YKTcLSqGta2zE+SU5NjLlRtLasNEgHN3V56nksTaLbUqYRUqOeGiG4jMDuXplXYutb2VHUyG9GCWz774kUxwned0hZ27/AMO7XU1ApgGDjkHLWGgElaqLjCF2Ya+9OdlwMxYrJje1uKJI60F2EHfAzXtuxtzUbPTGAsdUIhz26uEyJaTl/C4XDsnSszAMnO950Zk/QKfWszRpuVJV7vQ00YKC5l0hVt127E7onGXRLTvIEA+Ykc1cPoZZJqmhydziqy29s/e4K0DTrCq7b2z97gq1NDVsnffT0OKTklR68Eg6I1CEIJBOTUqAYK5unDgyAn3uPd8FSqddhzdHAK0dTPtUb02XQEKHbagbicdAJPkJXZlbioV5gup1I1LXRyMJqTRyzHPtPSPc57szl4cPJcxUtNL8xlPp2Rn0Z64GZno3ZnyJPcq97mVW4OkwO3OB6wPeOCi2V9us5LXQ8bngZEHw0KztXKNll/iVktNQdKzonyOuWupvBHeIJPctbdjWtbDarqontuM+QgCIlUFht/Sjoq1lxF3vnNoGW+fgrugxtNoYxoa0aAZAeSLWKTlcnWigyqw06jQ5jhBBEgry613I+jWdTnJp6p4t3ecfEFehOtBY5rp6hIa8cJya8cIJE9xPBVm0tmcXGowYi0QWjUjWRx1KEysHkzdSkKdNx3wTyWCwH7+K9AdQdUp55SQY7gQs7brBhMAfymU5WIqxuzOkwZGRG8ZEea0dyX7WwkF5Mfe5U9a66mZjIJLoaQ5wIzgH6J1S0omenvQmr8TS+01KpzeVpbm2feYcRhB952p8Bqo+wdxdOTWqf02nT9RHHu+a3NkqCrUkZADq943nzWOSehuTsTKdoe2mKTIYwCIbkTxJdxJ4QnUgGhLUbChvqShtt5KRStgW1ugF0gBok+CobbejToulpBtFfoTjbSAkvbGbho3Pd9YVhZ9nqDTOEu/cZHLRNjTbVy0c6EDZ2xF1VtodIDQQz+7Fk4+AiOfBbFQQI0XUVSBCa4eAxKx3c6FQW3tn73BWhM6qqtvbP3uCrJWRq2Tvvp6HJLz1TE5KOiNQhCCRUvPVNSoIFUu7NXeAUJTrq1d4D6q8O8hO0/TfviT4Ue31gym9ztA0/LIc1JWc24qnoqdFvarVmNjuBDuWLCnvQ5SMrd93ZOfEuflnuaN315cFJsdltFN+Jjx4OEgBa5uy9pEAUHQI3t0Hmuztm7T/AMl3Nvqs7jLw8jL2i4PzKqytwjj36KQE72Ko14puYQ8kANORk5D/ALqdUuS0NaXOpEAAkmW5AZk6qu63wIclxZAfSDmlrtCCD4HIrnYHlzZdqIDv3AQ74grrStGZaR1miSP1s4j6qysmztobjHRGCZbm3SB3qN1tYByS1K592U3OxxDoiQYkEg6aHMDPVZ992NZVe3tZakaSXGB4THktXggkEQQSD4jVUkYqoPETzc6PgqNjIakerczC0ZAQBoNSotLYOrUqhzWhjS1we92gktiG6uynThqFt7JdNoFSmRRdhmS6W6RllK0D6FXdTPw15rTTpXyxFWvuu0bGAs9207IH0aT3GRhMnPdiflpJLhHcuZpuc5uAQ1up0AA0A7+7h5TWX7XtNG1vFSk6mDPabDTTByc0+8TrkdTmruhd9qr02Gz0XGm+Ie6GgA6vOIgu8tUuUbywjRGaUE2xaF5PJLYBY0yXbz3DguptYc1zmbzDWnVxOkeeSfeVy16dMMbScymIx1CWkmTnoZLnExpv7oU26bjd0ofUpmkKeTAdcX6s9R89URg3KxE6kYw3/tqWV33YGUmtOZjM8XHMnmuVanhKvqdneR2fMaHvCiWu76hGTDI8Ft3cGPZ6u7PPEp4RCchUOncbCqrd2z97grdVNu7Z+9wS6uhq2N/O+j/o4oQk9Ug6IiEIQSCEqVAXGqfdWrvAfVQFYXTq7wH1V4d5CNp+k/fFFhCoL1oh9rpS6OiaCBxc8kZ+Ab8VoVR2+jirxIObMiYMCPrPNOqO0Tjt2TPUKtQNaXHQAk+AzVTs1tJQt7HVLOXENOF2IYSDrESrK8P6VT9jvkV5J+FNv9lFoNQ4mVHNIIgnFTaQcgIMyBM5YUypUUGruyOXRoSqp7qu0bzaVo9qsh3l4E+D2R8zzV1e/wD5et/8b/8AaVnLfbOmqWKrhLcVQwDnkKjBPnCsL3vdnRVQA57YdTLxhDA5wIgFxGM8cMwl9pFKUm8P0GLZ6jlGCWVh/n1wjIWO721q1ESQRUY5rhrAILm+BEr09YDZnC2tieQ1tMOfJyABGH5uWxr3jSYHYqjeoJcAQSNIyGcmchvRs7Si2/fvJWupSkkk/ftfkx1/08FeqBxkf5gD8yqOy0uu47h1R5a/GVcX/buleXimWDsjFqSzWRuOYEKusZGQIy498SsVSUW8cTpUqNRJ3WiV9Me/A9OsnYZ+1vyC4WO8WVHOY2ZbrI8lV0r9DsNKi0vqDqmcmtDYBe536Z4ekxLntYY9+MYqjjAbTBcXEZmJiB3mAuiqsXo8eRzJbNUWqy9Fx621tzeMN6ED8V7AKtCk4yMDzmNYLTI8yByW3aA0QBAAyA3ALKX9eDK9EdUjDVwuBwkEtEugtJBESri235RpuLXEnDk4taXBpIJwlwyBMHLuR2kF8zeGDoVW+zUW2r6Z8PD7flEGw3o23PYaYcKdM9I7GMOJ2lIDPSZd5K3vBwlk7yR8lmbrvD2doaKeKpVcDhnCGhxwtBdBgDIDzVnbLzY6lSq4TLndVres4uBjCOIJBzS6dWObvOr5Lh5WvzY+vQqPdUY/L3Vbi83fjl3s7d1LOLl89wAJOgEnyUZ940xmSeRTLO6o5p6SmGAjJuPE7f2oaAPIlVVaxVAMOEkZwYz7k9O6v/r+TG4bsrPyafmrorKoGIxpJjwnJc4T4QlnZGQqi8P6jvL5BXSpbw/qH73BLq6GvY+++noR0qROWc6bGIQhADkqahAWBWFz6u8B9VXqxubV3gPqrw7yM+1fSl9v5RZwslaHCpWxHPriPCclqLbVwU3OO4fwsdRtlMPaG4qjsQyAhozGpKvVeiOJJnstu/pv/Y75FeT7M1KLqVURAaaNNr9w6TG6o/DvgMy8V6xa2yx4Gpa4cwVjNg7gfT6b2ilAJpFgcAc2dJmP9SvtFPtGl16e/AzbFtHYNy6eF9dP4vyGX9VdU6AMpuayC2kNHvaMAyG6co5p173ZXLGPLIY1ropMgii0CWznmSc3Hu14dNtbS5ttu9rabnh1WC4RDB0lASZOmfwWmv6oG2au46CjVJjXJjilvZ95ycn4eSv7X/R8NudOMFCKSd/G+W1rfXjfXosHnWzbX2l7qMPimcNR+HDjDQHkxoZJESdfBWN1UugqDpG/mup4qVMjMPc7BTJB3yCtBsEAbL0gmKj3GTrDYZ82lS712fpV6gquLmvAAlp90EmIOmZ1VFsr3VOOZe/4GL9QtJ0pYho7LrfHPCfJGe2iY0UqbKcuFMlr3jsl7us4T7zpaSeCpbWQxhqPEZZDgBvPet5fNjaLMWMaA1mEgDdBE/AleT7f28soOaNSCByVKtK01fwXT2iaO03g93xd3fLvZt40vy0WOb9U2YsIo0A4CXVAHmN4IlrZ8PiSs5ddCvV6cN6pIOM6O3kUmzoCdfsHbXYzDRpN4U2Dk0Kq2fsT6dWs5zSA45E71rls8bRir2V/fvxMcNumpTm0nKVnd8LPTpy5LikZ+3UnssrKbqOANJOJxGJzyHTDRoIMSdye60tAoU8D3U8XSudhcTXrQZDZ1EmPvPQ7UNBYwYodjlneQDlylXLtFT4bgpaJLT/nvW+jdH9RSu3DVt4duFtWm21qs2XBKytjrFTq1jUpmkWOqOAqPI6rKTdGsnVxM/Pwn3vY7JQY3EW0IMtqBwY+R/e7M6rN/hTZbwbUtL7e2q0uZRDMZEdU1MQa0GBqE/8AFdpizvDWuLXPwEicDobLtYJiIyy1zRuKEHKWXz6+7vj+CPiJzqqnB7i/83a0t98JJLTzZY3ftNZ6dWpTqWsFuQY2rUaapMdY7jh4LXWau2oxr2EFrgCCMwQe8LxKl+HVrcS59nLi7MkvpEknfONevbN2Q0bJQpObhLKbWluRggaZZK+zydt1p/frov65CNsUZS7SLWfC3Bau3F8X4lJeA/Nf+53zXGFKvEfmv/cVHV2bIO8U+Q2FSXj/AFD97gr1UV5f1D5fIJVXQ3bF3309DghNQs51LCIQhADkqahAWBWVy6u8B9VWqVYLUKZJImY3q8GlK7E7RFypuK1/2iwvoxQqeHzICzVlIEHgQfirq328VKbmBpGIRMjJU9OzEDUIqyTeDkvZa37fNep6E/bGyjVz/wDQVwr7eWNnac//AEErCOsztzhPEqJaLpLhGMSd8fyr9vMzf4yp+1/lepOvzah9pt1mq02tbZ6VRmbndctD2uqPwgEaNECd3fA2d77V0XUKraYe5zqbw2GiC4tIGZOWa8qq7LVAAKdojecTcWZABiCIGWi72e5rS3/1DD/kcP8AqKjtJZs1kZ/j5u3yvHNHo1y7XWalZ6TH9IHBoxAUyQHHN2Y7yVnbTtC51qNVtWoGdKHBuJwGBrhlhmMwNO9VVGx1h/xmwcj1flnkg3af1Dl/KXOpJpLwGw2CUW3uvPNHoNs2zsjmPbif1mkdg7xC8ov2n7TaG/8ALYA7xM/9vsK3bdzh7w5JTd8+8OSl1JSkm1oVX6fOMXGKeea9T02z7S2eejl2JoAPVPAb1IpX9RcYBM+C8xZQe12MPz3znKsKFoLdTK0qunqZJfpldaRv91/bRqdqqDbSwMOjesDoQ7cRwj6qRR2ppBv5ocHAdaBIJ3kRuWa/xU6QeaiVq4duU9rHxK/47aP2ecfU0FX8SrA1xaX1AR/7Tlk9rtp2WxzBTa4U2YoxZFxdEmBMDLLxKpL32cNar0jagZlBBbOYOR17yls9wPb/AMQH/KfVZq1SUvlWhrofp84NScXfqj0a7tubK2jTbUc/GGNDoYSMQABz8U60/iHY2tJb0jzuaGRPm4gBefG53frHL+VzfcTj745fyo7eryJ/xafB/k210XkbVRbXIAc8uxAaAhxkeCmLM7Nk2am6m7rgvLhGUSACM+8T5q1/xYfoPMJ8aisrsvHZKqVt3+NPyWMKhvP+o7y+QU3/ABYfoPMKvtVXG4ugid3kAqVJJrBr2SjOE25K2P7RxSoSpJ0BiEIQSKhOQgLjUIQgAQhCABCEIAEIQgAQhCABCEIAEIQgAQhCABCEIAEIQgAQhCABCcmoAEISoAahCEAKhCEACEIQAIQhAAhCEACVCEAxUIQggENQhAAj1SoQQJ/KT0QhAC+qB6oQgAd6Jd/mlQgBvoUO9EqEAHqkH0QhAID6JfVCEEHNCEIGH//Z" alt="">
                    </div>
                    <div class="flex-1 p-4">
                        <h3 class="text-light mx-4 font-semibold">Legenda:</h3>
                        <p class="text-light m-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aperiam assumenda corporis, deleniti dicta enim esse fugit illo illum nisi numquam optio ratione recusandae reiciendis rerum sed ullam unde vel.</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center flex-col w-11/12 lg:w-full max-w-4xl h-auto mt-6 mx-auto">
                <AppButtonSingleStatus />
            </div>
        </MainContent>
    </AppLayout>
</template>

<script>
import {defineComponent} from "vue";
import {Head, Link} from "@inertiajs/inertia-vue3";
import AppLayout from "../../../Layouts/AppLayout";
import MainContent from "../../../Layouts/MainContent";
import AppIcons from "../../../Components/icons/AppIcons";
import AppTitle from "../../../Components/titles/AppTitle";
import AppButton from "../../../Components/buttons/AppButton";
import AppAccordion from "../../../Components/Accordion/AppAccordion";
import AppSingleStatus from "../../../Components/status/AppSingleStatus";
import AppButtonSingleStatus from "../../../Components/buttons/AppButtonSingleStatus";

export default  defineComponent({
    name: "Show",
    props: {
        job: Object
    },
    components: {
        Head,
        Link,
        AppLayout,
        MainContent,
        AppIcons,
        AppTitle,
        AppButton,
        AppAccordion,
        AppSingleStatus,
        AppButtonSingleStatus,
    }
})
</script>

<style scoped>

</style>
