module Adapter
    class Adapter
        @macbook
        def initialize(macbook)
            @macbook=macbook
        end
        def show
            @macbook.show2
        end
    end
    class Macbook
        def initialize
        end
        def show2
            puts 'showing'
        end
    end

    module Test
        class Client
            @item
            def initialize
            end
            def useAdapter(adapter)
                @item = adapter
            end
            def play
                @item.show
            end
        end
        mb = Macbook.new
        ad = Adapter.new mb

        c = Client.new
        c.useAdapter ad
        c.play
    end

end